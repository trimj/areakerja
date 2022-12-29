<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\Candidate;
use App\Models\JobVacancy;
use App\Models\JobCandidate;
use RealRashid\SweetAlert\Facades\Alert;

class JobCondidateBySkillController extends Controller
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

    public function candidateBySkill(JobVacancy $jobVacancy)
    {
        return view('mitra.candidate.bySkill', [
            'page_title' => 'Candidates ' . $this->page_title,
            'job' => $jobVacancy,
        ]);
    }

    public function unlockCandidate(JobVacancy $jobVacancy, Candidate $candidate)
    {
        if (!empty($candidate->jobCandidate) && $candidate->unlocked) {
            Alert::toast('Already unlocked', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$jobVacancy->id, $candidate->id]);
        }

        JobCandidate::create([
            'job_id' => $jobVacancy->id,
            'candidate_id' => $candidate->id,
            'unlocked' => true,
            'unlocked_at' => date('Y-m-d h:i:s', time()),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.candidate.show', ['jobVacancy' => $jobVacancy->id, 'candidate' => $candidate->id]);
    }

    public function showCandidate(JobVacancy $jobVacancy, Candidate $candidate)
    {
        $array = [
            'page_title' => $this->page_title,
            'job' => $jobVacancy,
            'candidate' => $candidate,
            'jobCandidate' => $candidate->jobCandidate,
        ];

        if (!empty($candidate->jobCandidate) && $candidate->jobCandidate->unlocked == true) {
            return view('mitra.candidate.show', $array);
        } else {
            return view('mitra.candidate.lock', $array);
        }
    }

    public function submitCandidate(JobVacancy $jobVacancy, candidate $candidate)
    {
        $jobCandidate = $this->jobCandidate($jobVacancy->id, $candidate->id);

        if (empty($jobCandidate) && !$jobCandidate->unlocked) {
            Alert::toast('Unlock candidate first!', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$jobVacancy->id, $jobCandidate->candidate_id]);
        }

        $jobCandidate->update([
            's_mitra' => date('Y-m-d h:i:s', time()),
            'a_mitra' => null,
            'r_mitra' => null,
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.candidate.show', [$jobVacancy->id, $jobCandidate->candidate_id]);
    }

    private function jobCandidate($jobId, $candidateId)
    {
        return JobCandidate::where('job_id', $jobId)->where('candidate_id', $candidateId)->first();
    }
}
