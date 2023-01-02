<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\JobCandidate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobPelamarController extends Controller
{
    private $page_title = 'Pelamar';

    public function __construct()
    {
        $this->middleware('permission:manage-job-candidate')->only('index');
        $this->middleware('permission:view-job-candidate')->only('show');
        $this->middleware('permission:accept-job-candidate')->only('acceptCandidate');
        $this->middleware('permission:reject-job-candidate')->only('rejectCandidate');
    }

    public function index(Request $request)
    {
        if (empty(auth()->user()->partner->id)) {
            Alert::toast('You are not Partner!', 'error');
            return redirect()->route('mitra.lowongan.pelamar.index');
        } else {
            $mitra = auth()->user()->partner;
        }

        $candidates = JobCandidate::where('mitra_id', $mitra->id)->whereNull('s_mitra')->whereNotNull('s_candidate');

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
                $sortby = 'candidate_id';
            } elseif ($request->sort == 'lamarDate') {
                $sortby = 'created_at';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('mitra.pelamar.index', [
            'page_title' => 'Pelamar ' . $this->page_title,
//            'candidates' => JobCandidate::where('mitra_id', $mitra->id)->whereNull('s_mitra')->whereNotNull('s_candidate')->get(),
            'candidates' => $candidates->paginate(20),
        ]);
    }

    public function show(JobCandidate $jobCandidate)
    {
        return view('mitra.pelamar.show', [
            'page_title' => $this->page_title,
            'jobCandidate' => $jobCandidate,
        ]);
    }

    public function acceptCandidate(JobCandidate $jobCandidate)
    {
        if (empty($jobCandidate) && !!empty($jobCandidate->unlocked->unlocked_at)) {
            Alert::toast('Something error!', 'error');
            return redirect()->route('mitra.lowongan.pelamar.show', [$jobCandidate->id]);
        }

        $jobCandidate->update([
            'a_mitra' => date('Y-m-d h:i:s', time()),
            'r_mitra' => null,
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.pelamar.show', [$jobCandidate->id]);
    }

    public function rejectCandidate(JobCandidate $jobCandidate)
    {
        if (empty($jobCandidate) && !!empty($jobCandidate->unlocked->unlocked_at)) {
            Alert::toast('Something error!', 'error');
            return redirect()->route('mitra.lowongan.pelamar.show', [$jobCandidate->id]);
        }

        $jobCandidate->update([
            'a_mitra' => null,
            'r_mitra' => date('Y-m-d h:i:s', time()),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('mitra.lowongan.pelamar.show', [$jobCandidate->id]);
    }
}
