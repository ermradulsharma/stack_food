<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Scopes\ZoneScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_HANDOVER = 'handover';
    public const STATUS_PICKED_UP = 'picked_up';
    public const STATUS_DELIVERED = 'delivered';
    public const STATUS_CANCELED = 'canceled';
    public const STATUS_FAILED = 'failed';
    public const STATUS_REFUND_REQUESTED = 'refund_requested';
    public const STATUS_REFUNDED = 'refunded';
    public const STATUS_ACCEPTED = 'accepted';

    protected $casts = [
        'order_amount' => 'float',
        'coupon_discount_amount' => 'float',
        'total_tax_amount' => 'float',
        'restaurant_discount_amount' => 'float',
        'delivery_address_id' => 'integer',
        'delivery_man_id' => 'integer',
        'delivery_charge' => 'float',
        'original_delivery_charge' => 'float',
        'user_id' => 'integer',
        'scheduled' => 'integer',
        'restaurant_id' => 'integer',
        'details_count' => 'integer',
        'processing_time' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'dm_tips' => 'float'
    ];

    public function setDeliveryChargeAttribute($value)
    {
        $this->attributes['delivery_charge'] = round($value, 3);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_code', 'code');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function delivery_history()
    {
        return $this->hasMany(DeliveryHistory::class, 'order_id');
    }

    public function dm_last_location()
    {
        // return $this->hasOne(DeliveryHistory::class, 'order_id')->latest();
        return $this->delivery_man->last_location();
    }

    public function transaction()
    {
        return $this->hasOne(OrderTransaction::class);
    }

    public function scopeAccepteByDeliveryman($query)
    {
        return $query->where('order_status', self::STATUS_ACCEPTED);
    }

    public function scopePreparing($query)
    {
        return $query->whereIn('order_status', [self::STATUS_CONFIRMED, self::STATUS_PROCESSING, self::STATUS_HANDOVER]);
    }


    //check from here
    public function scopeOngoing($query)
    {
        return $query->whereIn('order_status', [self::STATUS_ACCEPTED, self::STATUS_CONFIRMED, self::STATUS_PROCESSING, self::STATUS_HANDOVER, self::STATUS_PICKED_UP]);
    }

    public function scopeFoodOnTheWay($query)
    {
        return $query->where('order_status', self::STATUS_PICKED_UP);
    }

    public function scopePending($query)
    {
        return $query->where('order_status', self::STATUS_PENDING);
    }

    public function scopeFailed($query)
    {
        return $query->where('order_status', self::STATUS_FAILED);
    }

    public function scopeCanceled($query)
    {
        return $query->where('order_status', self::STATUS_CANCELED);
    }

    public function scopeDelivered($query)
    {
        return $query->where('order_status', self::STATUS_DELIVERED);
    }

    public function scopeRefunded($query)
    {
        return $query->where('order_status', self::STATUS_REFUNDED);
    }

    public function scopeSearchingForDeliveryman($query)
    {
        return $query->whereNull('delivery_man_id')->where('order_type', '=', 'delivery')->whereNotIn('order_status', [self::STATUS_DELIVERED, self::STATUS_FAILED, self::STATUS_CANCELED, self::STATUS_REFUND_REQUESTED, self::STATUS_REFUNDED]);
    }

    public function scopeDelivery($query)
    {
        return $query->where('order_type', '=', 'delivery');
    }

    public function scopeScheduled($query)
    {
        return $query->whereRaw('created_at <> schedule_at')->where('scheduled', '1');
    }

    public function scopeOrderScheduledIn($query, $interval)
    {
        return $query->where(function ($query) use ($interval) {
            $query->whereRaw('created_at <> schedule_at')->where(function ($q) use ($interval) {
                $q->whereBetween('schedule_at', [Carbon::now()->toDateTimeString(), Carbon::now()->addMinutes($interval)->toDateTimeString()]);
            })->orWhere('schedule_at', '<', Carbon::now()->toDateTimeString());
        })->orWhereRaw('created_at = schedule_at');
    }

    public function scopePos($query)
    {
        return $query->where('order_type', '=', 'pos');
    }

    public function scopeNotpos($query)
    {
        return $query->where('order_type', '<>', 'pos');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }

    protected static function booted()
    {
        static::addGlobalScope(new ZoneScope);
    }
}
