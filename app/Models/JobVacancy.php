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

    public function skill_list()
    {
        return $this->hasOne(SkillList::class, 'id', 'mainSkill');
    }
}
