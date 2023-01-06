<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobVacancy\Admin\JobStoreRequest;
use App\Http\Requests\JobVacancy\Admin\JobUpdateRequest;
use App\Models\JobVacancy;
use App\Models\Partner;
use App\Models\SkillList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JobVacancyController extends Controller
{
    private $page_title = 'Job Vacancy - Admin CP';

    public function __construct()
    {
        $this->middleware('can:manage-job-vacancy')->only('index');
        $this->middleware('can:create-job-vacancy')->only('create', 'store');
        $this->middleware('can:edit-job-vacancy')->only('edit', 'update');
        $this->middleware('can:delete-job-vacancy')->only('destroy');
    }

    public function index(Request $request)
    {
        $jobs = new JobVacancy();

        if ($request->has('q')) {
            $q = Str::lower($request->q);
            $jobs = $jobs->where('title', 'LIKE', '%' . $q . '%');
        }

        if ($request->has('order')) {
            if ($request->order == 'asc') {
                $orderby = 'asc';
            } elseif ($request->order == 'desc') {
                $orderby = 'desc';
            } else {
                $orderby = 'desc';
            }
        } else {
            $orderby = 'desc';
        }

        if ($request->has('sort')) {
            if ($request->sort == 'judul') {
                $sortby = 'title';
            } elseif ($request->sort == 'skill') {
                $sortby = 'mainSkill';
            } elseif ($request->sort == 'deadline') {
                $sortby = 'deadline';
            } elseif ($request->sort == 'minimumSalary') {
                $sortby = 'minSalary';
            } elseif ($request->sort == 'maximumSalary') {
                $sortby = 'maxSalary';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('admin.jobvacancy.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'jobs' => $jobs->orderBy($sortby, $orderby)->paginate(16),
        ]);
    }

    public function store(JobStoreRequest $storeRequest)
    {
        $validated = $storeRequest->validated();

        $partner = Partner::select('address')->where('id', $validated['partner'])->first();

        JobVacancy::create([
            'partner_id' => $validated['partner'],
            'title' => $validated['jobTitle'],
            'slug' => Str::slug($validated['jobTitle'], '-'),
            'description' => str_replace(["\r\n", "\r", "\n"], "\n", strip_tags($validated['jobDesc'])),
            'mainSkill' => $validated['jobMainSkill'],
            'otherSkill' => !empty($validated['jobOtherSkill']) ? array_filter($validated['jobOtherSkill']) : null,
            'address' => $partner->address,
            'minSalary' => str_replace(' ', '', $validated['jobMinSalary']),
            'maxSalary' => str_replace(' ', '', $validated['jobMaxSalary']),
            'deadline' => $validated['jobDeadline'],
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.lowongan.index');
    }

    public function create()
    {
        return view('admin.jobvacancy.create', [
            'page_title' => 'Manage ' . $this->page_title,
            'skills' => SkillList::all(),
            'partners' => Partner::all(),
        ]);
    }

    public function edit(JobVacancy $jobVacancy)
    {
        return view('admin.jobvacancy.edit', [
            'page_title' => $this->page_title,
            'job' => $jobVacancy,
            'skills' => SkillList::all(),
            'partners' => Partner::all(),
        ]);
    }

    public function update(JobUpdateRequest $updateRequest, JobVacancy $jobVacancy)
    {
        $validated = $updateRequest->validated();

        if ($validated['partner'] != $jobVacancy->partner_id) {
            $address = Partner::select('address')->where('id', $validated['partner'])->first()->address;
        } elseif (!empty($validated['address'])) {
            $address = array_filter($validated['address']);
        } else {
            $address = Partner::select('address')->where('id', $validated['partner'])->first()->address;
        }

        $jobVacancy->update([
            'partner_id' => $validated['partner'],
            'title' => $validated['jobTitle'],
            'slug' => Str::slug($validated['jobTitle'], '-'),
            'description' => str_replace(["\r\n", "\r", "\n"], "\n", strip_tags($validated['jobDesc'])),
            'mainSkill' => $validated['jobMainSkill'],
            'otherSkill' => !empty($validated['jobOtherSkill']) ? array_filter($validated['jobOtherSkill']) : null,
            'address' => $address,
            'minSalary' => str_replace(' ', '', $validated['jobMinSalary']),
            'maxSalary' => str_replace(' ', '', $validated['jobMaxSalary']),
            'deadline' => $validated['jobDeadline'],
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.lowongan.index');
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->delete();

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.lowongan.index');
    }
}
