<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JobCandidate;
use App\Models\Partner;
use App\Models\SkillList;
use Illuminate\Http\Request;
use App\Models\JobVacancy;
use Illuminate\Support\Str;

class JobVacancyController extends Controller
{
    protected $page_title = 'Lowongan';

    public function index(Request $request)
    {
        $jobs = new JobVacancy();

        if ($request->has('q')) {
            $q = Str::lower($request->q);
            $jobs = $jobs->where('title', 'LIKE', '%' . $q . '%');
        }

        if ($request->has('mitra')) {
            $mitra = intval($request->mitra);
            if (!empty($mitra)) {
                $jobs = $jobs->where('partner_id', $mitra);
            }
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
            } elseif ($request->sort == 'deadline') {
                $sortby = 'deadline';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('public.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => $jobs->orderBy($sortby, $orderby)->paginate(16),
        ]);
    }

    public function indexSkill($skill = null)
    {
        $skill = SkillList::where('slug', $skill)->first();

        if (isset($skill)) {
            $jobs = $skill->job_skill;
        } else {
            $jobs = [];
        }

        return view('public.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => $jobs,
        ]);
    }

    public function indexLocation($location = null)
    {
        if (isset($location)) {
            $partner = Partner::where('address', 'LIKE', '%' . $location . '%')->get();
            foreach ($partner as $partner_job) {
                $jobs = $partner_job->jobs;
            }
        } else {
            $jobs = [];
        }

        return view('public.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => $jobs,
        ]);
    }

    public function show(JobVacancy $job)
    {
        return redirect()->route('public.lowongan.showWithSlug', [$job->id, $job->slug]);
    }

    public function showWithSlug(JobVacancy $job, $slug)
    {
        if ($slug != $job->slug) {
            return redirect()->route('public.lowongan.show', [$job->id]);
        }

        if (!empty(auth()->user()->candidate)) {
            $jobCandidate = JobCandidate::where('job_id', $job->id)->where('candidate_id', auth()->user()->candidate->id)->first();
        } else {
            $jobCandidate = null;
        }

        return view('public.jobvacancy.show', [
            'page_title' => $this->page_title,
            'jobVacancy' => $job,
            'jobCandidate' => $jobCandidate,
        ]);
    }
}
