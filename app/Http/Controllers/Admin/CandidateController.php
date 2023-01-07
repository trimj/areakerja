<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CandidateController extends Controller
{
    private $page_title = 'Candidate - Admin CP';

    public function __construct()
    {
        $this->middleware('can:manage-candidate')->only('index', 'show');
        $this->middleware('can:create-candidate')->only('create', 'store');
        $this->middleware('can:edit-candidate')->only('edit', 'update');
        $this->middleware('can:delete-candidate')->only('destroy');
        $this->middleware('can:accept-pre-candidate')->only('acceptPreCandidate');
        $this->middleware('can:reject-pre-candidate')->only('rejectPreCandidate');
    }

    public function index(Request $request)
    {
        $candidates = new Candidate();

        return view('admin.candidate.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'candidates' => $candidates->orderBy('created_at', 'asc')->paginate(20),
        ]);
    }

    public function show(Candidate $candidate)
    {
        return view('admin.candidate.show', [
            'page_title' => $candidate->user->name . ' - Show ' . $this->page_title,
            'candidate' => $candidate,
        ]);
    }

    public function edit(Candidate $candidate)
    {
        return view('admin.candidate.edit', [
            'page_title' => $candidate->user->name . ' - Edit ' . $this->page_title,
            'candidate' => $candidate,
        ]);
    }

    public function destroy(Candidate $candidate)
    {
        // Role: Member
        $candidate->user->syncRoles([6]);
        $candidate->delete();

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.candidate.index');
    }

    public function acceptPreCandidate(Candidate $candidate)
    {
        if (!empty($candidate->submitted_at)) {
            $candidate->update([
                'approved_at' => date('Y-m-d h:i:s', time()),
                'rejected_at' => null,
            ]);

            // Role: Kandidat
            $candidate->user->syncRoles([5]);

            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('admin.candidate.index');
    }

    public function update(Request $request, Candidate $candidate)
    {
        Alert::toast('Successful', 'success');
        return redirect()->route('admin.candidate.show', ['candidate' => $candidate->id]);
    }

    public function rejectPreCandidate(Candidate $candidate)
    {
        if (!empty($candidate->submitted_at)) {
            $candidate->update([
                'submitted_at' => null,
                'approved_at' => null,
                'rejected_at' => date('Y-m-d h:i:s', time()),
            ]);

            // Role: Calon Kandidat
            $candidate->user->syncRoles([7]);

            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('admin.candidate.index');
    }
}
