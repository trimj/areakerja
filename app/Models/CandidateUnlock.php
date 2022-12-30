<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateUnlock extends Model
{
//    use HasFactory;

    public $fillable = [
        'candidate_id',
        'mitra_id',
        'unlocked_at',
    ];

    public $casts = [
        'candidate_id' => 'integer',
        'mitra_id' => 'integer',
        'unlocked_at' => 'datetime',
    ];
}
