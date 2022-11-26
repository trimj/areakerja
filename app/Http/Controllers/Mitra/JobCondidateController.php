<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\Candidate;
use App\Models\JobVacancy;
use App\Models\JobCandidate;
use RealRashid\SweetAlert\Facades\Alert;

class JobCondidateController extends Controller
{
    private $page_title = 'Job Candidate';

    public function __construct()
    {
        $this->middleware('permission:manage-job-candidate')->only('index');
        $this->middleware('permission:submit-job-candidate')->only('addCandidate');
        $this->middleware('permission:remove-job-candidate')->only('removeCandidate');
//        $this->middleware('permission:reject-job-candidate')->only('rejectCandidate');
        $this->middleware('permission:view-job-candidate')->only('showCandidate');
        $this->middleware('permission:unlock-job-candidate')->only('unlockCandidate');
    }

    public function index(JobVacancy $job)
    {
        return view('mitra.candidate.index', [
            'page_title' => 'Candidates ' . $this->page_title,
            'job' => $job,
        ]);
    }

    public function unlockCandidate(JobVacancy $job, Candidate $candidate)
    {
        if (!empty($this->jobCandidate($job->id, $candidate->id))) {
            Alert::toast('Already unlocked', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$job->id, $candidate->id]);
        }

        JobCandidate::create([
            'job_id' => $job->id,
            'candidate_id' => $candidate->id,
            'unlocked' => true,
            'unlocked_at' => date('Y-m-d h:i:s', time()),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.candidate.show', [$job->id, $candidate->id]);
    }

    private function jobCandidate($jobId, $candidateId)
    {
        return JobCandidate::where('job_id', $jobId)->where('candidate_id', $candidateId)->first();
    }

    public function showCandidate(JobVacancy $job, Candidate $candidate)
    {
        $jobCandidate = $this->jobCandidate($job->id, $candidate->id);

        $array = [
            'page_title' => $this->page_title,
            'job' => $job,
            'candidate' => $candidate,
            'jobCandidate' => $jobCandidate,
        ];

        if (!empty($jobCandidate) && $jobCandidate->unlocked == true) {
            return view('mitra.candidate.show', $array);
        } else {
            return view('mitra.candidate.lock', $array);
        }
    }

    public function submitCandidate(JobVacancy $job, Candidate $candidate)
    {
        $jobCandidate = $this->jobCandidate($job->id, $candidate->id);
        if ($jobCandidate->unlocked == false) {
            Alert::toast('Already unlocked', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$job->id, $candidate->id]);
        }

        $jobCandidate->update([
            's_mitra' => date('Y-m-d h:i:s', time()),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.candidate.show', [$job->id, $candidate->id]);
    }

    public function removeCandidate(JobVacancy $job, JobCandidate $jobCandidate)
    {
        //
    }
}
