<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillList extends Model
{
    // use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function job_skill()
    {
        return $this->hasMany(JobVacancy::class, 'mainSkill', 'id')->orderBy('created_at', 'desc');
    }
}
