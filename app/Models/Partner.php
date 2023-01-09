<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id',
        'coins',
        // Information
        'description',
        'email',
        'website',
        'phone',
        'address',
        // Agreement
        'tos',
        // Status
        'submitted_at',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'coins' => 'integer',
        'address' => 'array',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(JobVacancy::class, 'partner_id', 'id')->orderBy('created_at', 'desc');
    }

    public function unlockedCandidates()
    {
        return $this->hasMany(CandidateUnlock::class, 'mitra_id', 'id');
    }

    public function financial()
    {
        return $this->hasMany(Financial::class, 'partner_id', 'id');
    }
}
