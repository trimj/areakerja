<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JobCandidate;
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

    public function indexSkill(SkillList $skill)
    {
        return view('public.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => $skill->job_skill()->paginate(16),
        ]);
    }

    public function indexLocation($location)
    {
        return view('public.jobvacancy.index', [
            'page_title' => $this->page_title,
            'jobs' => JobVacancy::where('address', 'LIKE', '%' . $location . '%')->paginate(16),
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
