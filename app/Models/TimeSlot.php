<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'timeslot';

    public function scopeValidate($query)
    {
        $query->whereDate('start_date','<=',date('Y-m-d'))->whereDate('expiry_date','>=',date('Y-m-d'))->whereTime('start_time','<=',date('H:i:s'))->whereTime('end_time','>=',date('H:i:s'));
    }
}
