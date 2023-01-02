<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateUnlock;
use App\Models\JobCandidate;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JobCondidateController extends Controller
{
    private $page_title = 'Kandidat';

    public function __construct()
    {
        $this->middleware('permission:manage-job-candidate')->only('index');
        $this->middleware('permission:view-job-candidate')->only('show');
        $this->middleware('permission:unlock-job-candidate')->only('unlockCandidate');
        $this->middleware('permission:submit-job-candidate')->only('submitCandidate');
    }

    public function index(Request $request)
    {
        $candidates = new Candidate();

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
            if ($request->sort == 'name') {
                $sortby = 'user_id';
            } elseif ($request->sort == 'skill') {
                $sortby = 'skill_id';
            } elseif ($request->sort == 'borthDate') {
                $sortby = 'birthday';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('mitra.candidate.index', [
            'page_title' => 'Kandidat ' . $this->page_title,
            'candidates' => $candidates->orderBy($sortby, $orderby)->paginate(20),
        ]);
    }

    public function show(Candidate $candidate)
    {
        if (!empty($candidate->unlocked->unlocked_at)) {
            return view('mitra.candidate.show', [
                'page_title' => $this->page_title,
                'candidate' => $candidate,
                'jobCandidate' => $candidate->jobCandidate,
                'jobVacancies' => !empty(auth()->user()->partner->id) ? JobVacancy::where('partner_id', auth()->user()->partner->id)->get() : [],
            ]);
        } else {
            return view('mitra.candidate.lock', [
                'page_title' => $this->page_title,
                'candidate' => $candidate,
            ]);
        }
    }

    public function unlockCandidate(Candidate $candidate)
    {
        if (!empty($candidate->unlocked->unlocked_at)) {
            Alert::toast('Already unlocked', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$candidate->id]);
        }

        if (empty(auth()->user()->partner->id)) {
            Alert::toast('You are not Partner!', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$candidate->id]);
        } else {
            $mitra = auth()->user()->partner;
        }

        CandidateUnlock::create([
            'candidate_id' => $candidate->id,
            'mitra_id' => $mitra->id,
            'unlocked_at' => date('Y-m-d h:i:s', time()),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.candidate.show', ['candidate' => $candidate->id]);
    }

    public function submitCandidate(candidate $candidate, Request $request)
    {
        if (empty($candidate->jobCandidate) && !!empty($candidate->unlocked->unlocked_at)) {
            Alert::toast('Unlock candidate first!', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$candidate->id]);
        }

        if (empty(auth()->user()->partner->id)) {
            Alert::toast('You are not Partner!', 'error');
            return redirect()->route('mitra.lowongan.candidate.show', [$candidate->id]);
        } else {
            $mitra = auth()->user()->partner;
        }

        $request->validate([
            'lowongan' => ['required', 'numeric', 'exists:job_vacancies,id'],
        ]);

        JobCandidate::create([
            'unlock_id' => $candidate->unlocked->id,
            'job_id' => intval($request->lowongan),
            'candidate_id' => $candidate->id,
            'mitra_id' => $candidate->unlocked->mitra_id,
            's_mitra' => date('Y-m-d h:i:s', time()),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.candidate.show', [$candidate->id]);
    }
}
