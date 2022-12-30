<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCandidate extends Model
{
//    use HasFactory;

    public $fillable = [
        'unlock_id',
        'job_id',
        'candidate_id',
        'mitra_id',
        's_mitra',
        'a_mitra',
        'r_mitra',
        's_candidate',
        'a_candidate',
        'r_candidate',
    ];

    public $casts = [
        'unlock_id' => 'integer',
        'job_id' => 'integer',
        'candidate_id' => 'integer',
        'mitra_id' => 'integer',
        's_mitra' => 'datetime',
        'a_mitra' => 'datetime',
        'r_mitra' => 'datetime',
        's_candidate' => 'datetime',
        'a_candidate' => 'datetime',
        'r_candidate' => 'datetime',
    ];

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'id', 'candidate_id');
    }

    public function vacancy()
    {
        return $this->hasOne(JobVacancy::class, 'id', 'job_id');
    }

    public function mitra()
    {
        return $this->hasOne(Partner::class, 'id', 'mitra_id');
    }

    public function unlocked()
    {
        return $this->hasOne(CandidateUnlock::class, 'id', 'unlock_id');
    }
}
