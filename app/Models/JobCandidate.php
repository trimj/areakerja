<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCandidate extends Model
{
//    use HasFactory;

    public $fillable = [
        'job_id',
        'candidate_id',
        'unlocked',
        'unlocked_at',
        's_mitra',
        'a_mitra',
        'r_mitra',
        's_candidate',
        'a_candidate',
        'r_candidate',
    ];

    public $casts = [
        'unlocked' => 'boolean',
        'unlocked_at' => 'datetime',
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
}
