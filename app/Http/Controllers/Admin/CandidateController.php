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

    public function update(Request $request, Candidate $candidate)
    {
        Alert::toast('Successful', 'success');
        return redirect()->route('admin.candidate.show', ['candidate' => $candidate->id]);
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        $candidate->user->syncRoles([6]);

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.candidate.index');
    }
}
