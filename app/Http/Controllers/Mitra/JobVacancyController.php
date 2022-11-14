<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\JobVacancy;

class JobVacancyController extends Controller
{
    protected $page_title = 'Lowongan Kerja';

    public function index(Request $request)
    {
        $jobs = JobVacancy::orderBy('created_at', 'desc')->get();

        return view('mitra.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('mitra.jobvacancy.create', [
            'page_title' => $this->page_title,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //
        ]);
    }

    public function edit(JobVacancy $jobVacancy)
    {
        return view('mitra.jobvacancy.edit', [
            'page_title' => $this->page_title,
            'job' => $jobVacancy,
        ]);
    }

    public function update(JobVacancy $jobVacancy, Request $request)
    {
        $request->validate([
            //
        ]);
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->where('id', $jobVacancy->id)->delete();

        return redirect()->route('mitra.lowongan.index');
    }
}
