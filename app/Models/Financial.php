<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'financials';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'billing_name',
        'date',
        'total',
        'payment_status',
        'payment_method',
    ];
}
