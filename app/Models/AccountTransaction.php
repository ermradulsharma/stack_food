<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\DeliveryMan;

class AccountTransaction extends Model
{
    use HasFactory;

    protected $casts = [
        'amount' => 'float',
        'current_balance' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function restaurant_from()
    {
        return $this->belongsTo(Restaurant::class, 'from_id');
    }

    public function deliveryman_from()
    {
        return $this->belongsTo(DeliveryMan::class, 'from_id');
    }

    public function getRestaurantAttribute()
    {
        if ($this->from_type == 'restaurant') {
            return $this->restaurant_from;
        }
        return null;
    }

    public function getDeliverymanAttribute()
    {
        if ($this->from_type == 'deliveryman') {
            return $this->deliveryman_from;
        }
        return null;
    }
}
