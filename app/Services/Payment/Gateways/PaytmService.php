<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class PaytmService implements PaymentGatewayInterface
{
    private function encrypt_e($input, $ky)
    {
        $key = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);
        return $data;
    }

    private function decrypt_e($crypt, $ky)
    {
        $key = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);
        return $data;
    }

    private function generateSalt_e($length)
    {
        $random = "";
        srand((float)microtime() * 1000000);

        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";

        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }

        return $random;
    }

    private function checkString_e($value)
    {
        if ($value == 'null')
            $value = '';
        return $value;
    }

    private function getChecksumFromArray($arrayList, $key, $sort = 1)
    {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = $this->getArray2Str($arrayList);
        $salt = $this->generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = $this->encrypt_e($hashString, $key);
        return $checksum;
    }

    // Unused methods omitted for brevity as they were not used in main flow (verifychecksum_eFromStr, getChecksumFromString etc)
    // Actually verifychecksum_e IS used.

    private function verifychecksum_e($arrayList, $key, $checksumvalue)
    {
        $arrayList = $this->removeCheckSumParam($arrayList);
        ksort($arrayList);
        $str = $this->getArray2StrForVerify($arrayList);
        $paytm_hash = $this->decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);

        $finalString = $str . "|" . $salt;

        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;

        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }

    private function getArray2Str($arrayList)
    {
        $findme = 'REFUND';
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pos = strpos($value, $findme);
            $pospipe = strpos($value, $findmepipe);
            if ($pos !== false || $pospipe !== false) {
                continue;
            }

            if ($flag) {
                $paramStr .= $this->checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . $this->checkString_e($value);
            }
        }
        return $paramStr;
    }

    private function getArray2StrForVerify($arrayList)
    {
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            if ($flag) {
                $paramStr .= $this->checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . $this->checkString_e($value);
            }
        }
        return $paramStr;
    }

    private function removeCheckSumParam($arrayList)
    {
        if (isset($arrayList["CHECKSUMHASH"])) {
            unset($arrayList["CHECKSUMHASH"]);
        }
        return $arrayList;
    }

    public function initialize(array $data)
    {
        $order = $data['order'];
        $user = $order->customer; // User relation should be loaded
        $value = $order->order_amount;

        $paramList = array();
        $ORDER_ID = $order->id;
        $CUST_ID = $user ? $user->id : 'guest';
        $INDUSTRY_TYPE_ID = isset($data['request']['INDUSTRY_TYPE_ID']) ? $data['request']['INDUSTRY_TYPE_ID'] : 'Retail';
        $CHANNEL_ID = isset($data['request']['CHANNEL_ID']) ? $data['request']['CHANNEL_ID'] : 'WEB';
        $TXN_AMOUNT = round($value, 2);

        $paramList["MID"] = config('paytm.merchant_id');
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = config('paytm.merchant_website');

        $paramList["CALLBACK_URL"] = route('paytm-response');
        $paramList["MSISDN"] = $user ? $user->phone : '';
        $paramList["EMAIL"] = $user ? $user->email : '';
        $paramList["VERIFIED_BY"] = "EMAIL";
        $paramList["IS_USER_VERIFIED"] = "YES";

        $checkSum = $this->getChecksumFromArray($paramList, config('paytm.merchant_key'));

        // Return view or data. Standardizing on view for form submission if needed, 
        // or just return data if the caller handles it.
        // Controller returns view('paytm-payment-view', compact('checkSum', 'paramList'));
        // I will return the data and let the caller/controller decide, OR return the view if allowed.
        // Interface says mixed.

        return view('paytm-payment-view', compact('checkSum', 'paramList'));
    }

    public function verify(Request $request)
    {
        $orderId = $request->ORDERID;
        $order = Order::with(['details'])->where(['id' => $orderId])->first();

        if (!$order) {
            return redirect()->route('payment-fail');
        }

        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";

        $isValidChecksum = $this->verifychecksum_e($paramList, config('paytm.merchant_key'), $paytmChecksum);

        if ($isValidChecksum == "TRUE") {
            if ($request["STATUS"] == "TXN_SUCCESS") {
                $order->payment_method = 'paytm';
                $order->payment_status = 'paid';
                $order->order_status = 'confirmed';
                $order->confirmed = now();
                $order->save();
                try {
                    Helpers::send_order_notification($order);
                } catch (\Exception $e) {
                }

                if ($order->callback != null) {
                    return redirect($order->callback . '&status=success');
                } else {
                    return redirect()->route('payment-success');
                }
            }
        }

        $order->order_status = 'failed';
        $order->failed = now();
        $order->save();
        if ($order->callback != null) {
            return redirect($order->callback . '&status=fail');
        } else {
            return redirect()->route('payment-fail');
        }
    }

    public function fail(Request $request)
    {
        return redirect()->route('payment-fail');
    }
}
