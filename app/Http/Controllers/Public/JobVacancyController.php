<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobVacancy;

class JobVacancyController extends Controller
{
    protected $page_title = 'Lowongan';

    public function index(Request $request)
    {
        $jobs = JobVacancy::orderBy('created_at', 'desc');

        return view('public.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => $jobs->get(),
        ]);
    }

    public function show(JobVacancy $jobVacancy)
    {
        return view('public.jobvacancy.show', [
            'page_title' => $this->page_title,
            'jobs' => $jobVacancy,
        ]);
    }
}
