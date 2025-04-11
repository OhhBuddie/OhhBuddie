<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'txn_id',
        'first_name',
        'email',
        'amount',
        'currency',
        'status',
        'payment_method',
        'payment_details'
    ];
}