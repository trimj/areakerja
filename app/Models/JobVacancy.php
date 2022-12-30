<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
//    use HasFactory;

    protected $fillable = [
        'partner_id',
        // Information
        'title',
        'slug',
        'description',
        // Requirements
        'mainSkill',
        'otherSkill',
        // Location
        'address',
        // Salary
        'minSalary',
        'maxSalary',
        // Deadline
        'deadline',
    ];

    protected $casts = [
        'otherSkill' => 'array',
        'address' => 'array',
        'deadline' => 'datetime',
    ];

    public function mitra()
    {
        return $this->hasOne(Partner::class, 'id', 'partner_id');
    }

    public function main_skill()
    {
        return $this->hasOne(SkillList::class, 'id', 'mainSkill');
    }

    public function candidatesBySkill()
    {
        return $this->hasMany(Candidate::class, 'skill_id', 'mainSkill');
    }

//    public function candidates()
//    {
//        return $this->hasMany(Candidate::class, 'skill_id', 'mainSkill');
//    }
}
