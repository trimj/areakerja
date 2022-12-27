<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\JobCandidate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobVacancyController extends Controller
{
    private $page_title = 'Kandidat CP';

    public function __construct()
    {
        $this->middleware('can:manage-my-job');
    }

    public function index()
    {
        $jobCandidate = JobCandidate::where('candidate_id', auth()->user()->candidate->id);

        return view('candidate.lowongan', [
            'jobsbymitra' => $jobCandidate->whereNotNull('s_mitra')->get(),
            'jobsbyme' => $jobCandidate->whereNotNull('s_candidate')->get(),
        ]);
    }

    public function acceptJobFromMitra(JobCandidate $jobCandidate)
    {
        if (!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate)) {
            $jobCandidate->update([
//            's_candidate' => date('Y-m-d h:i:s', time()),,
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
//            's_candidate' => date('Y-m-d h:i:s', time()),,
                'a_candidate' => null,
                'r_candidate' => date('Y-m-d h:i:s', time()),
            ]);

            Alert::toast('Job Rejected by Candidate', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }
        
        return redirect()->route('kandidat.lowongan.index');
    }
}
