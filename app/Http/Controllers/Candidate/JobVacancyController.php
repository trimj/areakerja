<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateUnlock;
use App\Models\JobCandidate;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JobVacancyController extends Controller
{
    private $page_title = 'Kandidat CP';

    public function __construct()
    {
        $this->middleware('can:manage-my-job')->only('index');
        $this->middleware('can:accept-job-from-mitra')->only('acceptJobFromMitra');
        $this->middleware('can:reject-job-from-mitra')->only('rejectJobFromMitra');
    }

    public function index(Request $request)
    {
        $jobCandidate = JobCandidate::where('candidate_id', auth()->user()->candidate->id)->whereNotNull('s_mitra')->orwhereNotNull('s_candidate');

        if ($request->has('q')) {
            $q = Str::lower($request->q);
            $jobCandidate = $jobCandidate->where('title', 'LIKE', '%' . $q . '%');
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
            if ($request->sort == 'job') {
                $sortby = 'job_id';
            } elseif ($request->sort == 'mitra') {
                $sortby = 'mitra_id';
            } elseif ($request->sort == 'lamarDate') {
                $sortby = 'deadline';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('candidate.lowongan', [
            'page_title' => 'Lowongan Kerja' . $this->page_title,
            'jobCandidate' => $jobCandidate->orderBy($sortby, $orderby)->paginate(20),
        ]);
    }

    public function acceptJobFromMitra(JobCandidate $jobCandidate)
    {
        if (!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate)) {
            $jobCandidate->update([
                'a_candidate' => date('Y-m-d h:i:s', time()),
                'r_candidate' => null,
            ]);

            Alert::toast('Job Accepted by Candidate', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('kandidat.lowongan.index');
    }

    public function rejectJobFromMitra(JobCandidate $jobCandidate)
    {
        if (!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate)) {
            $jobCandidate->update([
                'a_candidate' => null,
                'r_candidate' => date('Y-m-d h:i:s', time()),
            ]);

            Alert::toast('Job Rejected by Candidate', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('kandidat.lowongan.index');
    }

    public function registerJobForMe(JobVacancy $job)
    {
        $candidate = auth()->user()->candidate;
        $jobCandidate = $job->checkJobCandidate()->where('candidate_id', $candidate->id)->first();

        if (empty($jobCandidate)) {
            DB::transaction(function () use ($job, $candidate) {
                $unlockId = CandidateUnlock::insertGetId([
                    'candidate_id' => $candidate->id,
                    'mitra_id' => $job->mitra->id,
                    'unlocked_at' => date('Y-m-d h:i:s', time()),
                    'created_at' => date('Y-m-d h:i:s', time()),
                    'updated_at' => date('Y-m-d h:i:s', time()),
                ]);
                JobCandidate::create([
                    'unlock_id' => $unlockId,
                    'job_id' => $job->id,
                    'candidate_id' => $candidate->id,
                    'mitra_id' => $job->mitra->id,
                    's_candidate' => date('Y-m-d h:i:s', time()),
                ]);
            });
            Alert::toast('Successful, waiting for approval by mitra', 'success');
        } elseif (!empty($jobCandidate) && empty($jobCandidate->s_mitra && empty($jobCandidate->s_candidate))) {
            $jobCandidate->update([
                's_candidate' => date('Y-m-d h:i:s', time()),
                'a_mitra' => null,
            ]);
            Alert::toast('Successful, waiting for approval by mitra', 'success');
        } elseif (!empty($jobCandidate) && !empty($jobCandidate->s_mitra && empty($jobCandidate->a_candidate))) {
            $jobCandidate->update([
                'a_candidate' => date('Y-m-d h:i:s', time()),
                'a_mitra' => null,
            ]);
            Alert::toast('Successful, waiting for approval by mitra', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('public.lowongan.show', $job->id);
    }
}
