<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Restaurant;
use App\Models\Subscription;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\CentralLogics\Helpers;

class SubscriptionController extends Controller
{
    function index(Request $request)
    {
        $subscriptions = Subscription::with(['customer','orders','vendor','product'])->paginate(config('default_pagination'));
        return view('admin-views.subscription.index', compact('subscriptions'));
    }

}
