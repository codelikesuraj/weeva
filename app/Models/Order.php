<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $with = [
        'deliveries',
        'issuedBy',
        'ownedBy'
    ];
    protected $fillable = [
        'owned_by',
        'waybill_no',
        'date_issued',
        'quantity',
        'value',
        'description',
        'customer_name',
        'issued_by',
        'deadline',
        'status',
    ];

    public function ownedBy()
    {
        return $this->belongsTo(User::class, 'owned_by');
    }

    public function issuedBy()
    {
        return $this->belongsTo(Contact::class, 'issued_by');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'order_id')->without('orderInfo')->orderBy('date_delivered', 'desc');
    }
}
