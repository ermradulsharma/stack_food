<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions';

    public function orders(){
      return $this->hasMany(SubscriptionRepeat::class,'subscription_id', 'id');
    }
    
    
    public function customer(){
        return $this->belongsTo(User::class, 'customer_id','id');
    }
    
    
    public function vendor(){
        return $this->belongsTo(Restaurant::class, 'vendor_id','id');
    }
    
    
    public function product(){
        return $this->belongsTo(Food::class, 'product_id','id');
    }
}
