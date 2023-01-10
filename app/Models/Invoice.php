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
        'invoice',
        'amount',
        'payment_status',
        'snap_token',
    ];

    public function partner()
    {
        return $this->hasOne(Partner::class, 'id', 'partner_id');
    }

    public function logkoin()
    {
        return $this->hasOne(CoinLog::class, 'id', 'coin_log_id');
    }

    public function statusPending()
    {
        $this->attributes['payment_status'] = 'pending';
        $this->save();
    }

    public function statusSuccess()
    {
        $this->attributes['payment_status'] = 'success';
        $this->save();
    }

    public function statusFailes()
    {
        $this->attributes['payment_status'] = 'failed';
        $this->save();
    }

    public function statusExpired()
    {
        $this->attributes['payment_status'] = 'expired';
        $this->save();
    }

    public function statusCanceled()
    {
        $this->attributes['payment_status'] = 'canceled';
        $this->save();
    }
}
