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
    ];
}
