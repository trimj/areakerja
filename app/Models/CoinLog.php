<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinLog extends Model
{
//    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'partner_id',
        'candidate_id',
        'job_id',
        'invoice',
        'type',
        'detail',
        'before',
        'after',
    ];

    public $casts = [
        'candidate_id' => 'integer',
        'mitra_id' => 'integer',
        'job_id' => 'integer',
        'before' => 'integer',
        'after' => 'integer',
    ];

    public function mitra()
    {
        return $this->hasOne(Partner::class, 'id', 'partner_id');
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'id', 'candidate_id');
    }

    public function job()
    {
        return $this->hasOne(JobVacancy::class, 'id', 'job_id');
    }
}
