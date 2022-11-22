<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\JobVacancy;

class JobCondidateController extends Controller
{
    private $page_title = 'Job Candidate';

    public function __construct()
    {
        //
    }

    public function show(JobVacancy $jobVacancy)
    {
        return view('mitra.candidate.show', [
            'page_title' => 'Candidates ' . $this->page_title,
            'job' => $jobVacancy,
        ]);
    }
}
