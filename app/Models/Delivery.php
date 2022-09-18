<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';
    protected $with = [
        'deliveredBy',
        'orderInfo'
    ];
    protected $fillable = [
        'quantity',
        'user_id',
        'order_id',
        'date_delivered',
        'value',
    ];

    public function deliveredBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderInfo()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
