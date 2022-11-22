<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\JobVacancy;
use App\Models\SkillList;
use App\Models\Partner;
use Alert;
use Illuminate\Support\Str;

class JobVacancyController extends Controller
{
    protected $page_title = 'Lowongan Kerja';

    protected function partner()
    {
        return Partner::where('user_id', auth()->user()->id)->first();
    }

    public function __construct()
    {
        $this->middleware('permission:manage-job-vacancy')->only('index');
        $this->middleware('permission:create-job-vacancy')->only('create', 'store');
        $this->middleware('permission:edit-job-vacancy')->only('edit', 'update');
        $this->middleware('permission:delete-job-vacancy')->only('destroy');
    }

    public function index(Request $request)
    {
        return view('mitra.jobvacancy.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'jobs' => JobVacancy::where('partner_id', $this->partner()->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('mitra.jobvacancy.create', [
            'page_title' => 'Create ' . $this->page_title,
            'skills' => SkillList::all(),
            'partner' => $this->partner(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jobTitle' => ['required', 'string', 'max:100'],
            'jobDesc' => ['required', 'string', 'max:5000'],

            'jobMainSkill' => ['required', 'numeric', 'exists:skill_lists,id'],
            'jobOtherSkill' => ['nullable', 'array'],
            'jobOtherSkill.*' => ['nullable', 'numeric', 'exists:skill_lists,id'],

            'address' => ['required', 'array', 'max:4'],
            'address.provinsi' => ['required', 'numeric'],
            'address.kota' => ['required', 'numeric'],
            'address.kecamatan' => ['required', 'numeric'],
            'address.kelurahan' => ['required', 'numeric'],

            'jobMinSalary' => ['required', 'numeric'],
            'jobMaxSalary' => ['required', 'numeric'],

            'jobDeadline' => ['required', 'date']
        ]);

        JobVacancy::create([
            'partner_id' => $this->partner()->id,
            'title' => $request->jobTitle,
            'slug' => Str::slug($request->jobTitle, '-'),
            'description' => str_replace(["\r\n", "\r", "\n"], "\n", $request->jobDesc),
            'mainSkill' => $request->jobMainSkill,
            'otherSkill' => !empty($request->jobOtherSkill) ? array_filter($request->jobOtherSkill) : null,
            'address' => !empty($request->address) ? array_filter($request->address) : null,
            'minSalary' => str_replace(' ', '', $request->jobMinSalary),
            'maxSalary' => str_replace(' ', '', $request->jobMaxSalary),
            'deadline' => $request->jobDeadline,
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.index');
    }

    public function edit(JobVacancy $jobVacancy)
    {
        return view('mitra.jobvacancy.edit', [
            'page_title' => $this->page_title,
            'job' => $jobVacancy,
            'skills' => SkillList::all(),
        ]);
    }

    public function update(JobVacancy $jobVacancy, Request $request)
    {
        $request->validate([
            'jobTitle' => ['required', 'string', 'max:100'],
            'jobDesc' => ['required', 'string', 'max:5000'],

            'jobMainSkill' => ['required', 'numeric', 'exists:skill_lists,id'],
            'jobOtherSkill' => ['nullable', 'array'],
            'jobOtherSkill.*' => ['nullable', 'numeric', 'exists:skill_lists,id'],

            'address' => ['required', 'array', 'max:4'],
            'address.provinsi' => ['required', 'numeric'],
            'address.kota' => ['required', 'numeric'],
            'address.kecamatan' => ['required', 'numeric'],
            'address.kelurahan' => ['required', 'numeric'],

            'jobMinSalary' => ['required', 'numeric'],
            'jobMaxSalary' => ['required', 'numeric'],

            'jobDeadline' => ['required', 'date']
        ]);

        $jobVacancy->update([
            'partner_id' => $this->partner()->id,
            'title' => $request->jobTitle,
            'slug' => Str::slug($request->jobTitle, '-'),
            'description' => str_replace(["\r\n", "\r", "\n"], "\n", $request->jobDesc),
            'mainSkill' => $request->jobMainSkill,
            'otherSkill' => !empty($request->jobOtherSkill) ? array_filter($request->jobOtherSkill) : null,
            'address' => !empty($request->address) ? array_filter($request->address) : null,
            'minSalary' => str_replace(' ', '', $request->jobMinSalary),
            'maxSalary' => str_replace(' ', '', $request->jobMaxSalary),
            'deadline' => $request->jobDeadline,
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.index');
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->delete();

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.index');
    }
}
