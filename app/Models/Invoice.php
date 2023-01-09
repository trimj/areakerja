<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'coin_log_id',
        'partner_id',
        'amount',
        'payment_status',
        'snap_token',
    ];

    public function partner()
    {
        return $this->hasOne(Partner::class, 'id', 'partner_id');
    }
}
