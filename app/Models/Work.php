<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'owned_by',
        'issued_at',
        'description',
        'customer',
        'due_at',
        'issued_by',
        'status',
    ];
}
