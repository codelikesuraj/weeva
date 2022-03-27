<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuedTo extends Model
{
    use HasFactory;
    protected $table = 'issued_to';

    protected $fillable = [
        'work_id',
        'contact_id',
    ];
}
