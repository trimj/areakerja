<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\SkillList;
use App\Models\Candidate;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
use Alert;

class CandidateController extends Controller
{
    protected $page_title = 'Daftar Kandidat';

    private function steps(int $step, int $allSteps = 6)
    {
        $arr = [];
        for ($i = 1; $i <= $allSteps; $i++) {
            if ($i == $step) {
                $arr[$i] = 'active';
            } else if ($i < $step) {
                $arr[$i] = 'done';
            } else {
                $arr[$i] = null;
            }
        }
        return $arr;
    }

    public function __construct()
    {
//        $this->middleware('can:access-admincp');
//        $this->middleware('can:edit-user')->only('edit', 'update');
//        $this->middleware('can:edit-user-role')->only('updateRole');
    }

    public function index()
    {
        return view('member.candidate.index', [
            'page_title' => $this->page_title,
        ]);
    }

    public function informationIndex()
    {
        $candidate = Candidate::select('birthday', 'address', 'about', 'submitted_at', 'approved_at', 'rejected_at')->where('user_id', auth()->user()->id)->first();

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('member.candidate.information', [
            'step' => $this->steps(1, 6),
            'page_title' => $this->page_title,
            'candidate' => $candidate,
        ]);
    }

    public function informationStore(Request $request)
    {
        $request->validate([
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:500'],
            'address.*' => ['required', 'string', 'max:500'],
            'about' => ['nullable', 'string', 'max:1000'],
        ]);

        Candidate::where('user_id', $user->id)->update([
            'birthday' => $request->birthdate,
//            'address' => $request->address,
            'address' => !empty($request->address) ? array_filter($request->address) : null,
            'about' => $request->about,
        ]);

        return redirect()->route('member.daftar.kandidat.skill.index');
    }

    public function skillIndex()
    {
        $candidate = Candidate::select('skill_id', 'skill', 'submitted_at', 'approved_at', 'rejected_at')->where('user_id', auth()->user()->id)->first();

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('member.candidate.skill', [
            'step' => $this->steps(2, 6),
            'page_title' => $this->page_title,
            'mainSkills' => SkillList::orderBy('name', 'asc')->get(),
            'candidate' => $candidate,
        ]);
    }

    public function skillStore(Request $request)
    {
        $request->validate([
            'mainSkill' => ['required', 'exists:App\Models\SkillList,id'],
            'otherSkill' => ['nullable', 'array'],
            'otherSkill.*' => ['nullable', 'string', 'max:255'],
        ]);

        Candidate::where('user_id', auth()->user()->id)->update([
            'skill_id' => $request->mainSkill,
            'skill' => !empty($request->otherSkill) ? array_filter($request->otherSkill) : null,
        ]);

        return redirect()->route('member.daftar.kandidat.education.index');
    }

    public function educationIndex()
    {
        $candidate = Candidate::select('education', 'submitted_at', 'approved_at', 'rejected_at')->where('user_id', auth()->user()->id)->first();

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('member.candidate.education', [
            'step' => $this->steps(3, 6),
            'page_title' => $this->page_title,
            'candidate' => $candidate,
        ]);
    }

    public function educationStore(Request $request)
    {
        $request->validate([
            'education' => ['required', 'array'],
            'education.*.name' => ['required', 'string'],
            'education.*.from' => ['required', 'date'],
            'education.*.to' => ['nullable', 'date'],
        ]);

        Candidate::where('user_id', auth()->user()->id)->update([
            'education' => !empty($request->education) ? array_filter($request->education) : null,
        ]);

        return redirect()->route('member.daftar.kandidat.certificate.index');
    }

    public function certificateIndex()
    {
        $candidate = Candidate::select('certificate', 'submitted_at', 'approved_at', 'rejected_at')->where('user_id', auth()->user()->id)->first();

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('member.candidate.certificate', [
            'step' => $this->steps(4, 6),
            'page_title' => $this->page_title,
            'candidate' => $candidate,
        ]);
    }

    public function certificateStore(Request $request)
    {
        $request->validate([
            'certificate' => ['nullable', 'array'],
            'certificate.*.title' => ['string'],
            'certificate.*.get' => ['date'],
        ]);

        Candidate::where('user_id', auth()->user()->id)->update([
            'certificate' => !empty($request->certificate) ? array_filter($request->certificate) : null,
        ]);

        return redirect()->route('member.daftar.kandidat.experience.index');
    }

    public function experienceIndex()
    {
        $candidate = Candidate::select('experience', 'submitted_at', 'approved_at', 'rejected_at')->where('user_id', auth()->user()->id)->first();

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('member.candidate.experience', [
            'step' => $this->steps(5, 6),
            'page_title' => $this->page_title,
            'candidate' => $candidate,
        ]);
    }

    public function experienceStore(Request $request)
    {
        $request->validate([
            'experience' => ['nullable', 'array'],
            'experience.*.title' => ['string'],
            'experience.*.location' => ['string'],
            'experience.*.from' => ['date'],
            'experience.*.to' => ['date'],
        ]);

        Candidate::where('user_id', auth()->user()->id)->update([
            'experience' => !empty($request->experience) ? array_filter($request->experience) : null,
        ]);

        return redirect()->route('member.daftar.kandidat.agreement.index');
    }

    public function agreementIndex()
    {
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        if (empty($candidate)) {
            Candidate::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        $notComplete = false;
        if (empty($candidate->photo) || empty($candidate->birthday) || empty($candidate->address) || empty($candidate->skill_id) || empty($candidate->education)) {
            $notComplete = true;
            Alert::error('Silahkan isi yang diperlukan');
        }

        return view('member.candidate.agreement', [
            'step' => $this->steps(6, 6),
            'page_title' => $this->page_title,
            'candidate' => $candidate,
            'notComplete' => $notComplete,
        ]);
    }

    public function agreementStore(Request $request)
    {
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();
        if (empty($candidate->photo) || empty($candidate->birthday) || empty($candidate->address) || empty($candidate->skill_id) || empty($candidate->education)) {
            Alert::error('Silahkan isi yang diperlukan');
            return redirect()->route('member.daftar.kandidat.agreement.index');
        }

        if (empty($candidate->submitted_at)) {
            $request->validate([
                'agreementTos' => ['required', 'accepted'],
            ]);
            Candidate::where('user_id', auth()->user()->id)->update([
                'tos' => true,
                'submitted_at' => date('Y-m-d H:i:s', time()),
            ]);
        } else {
            Alert('warning', 'You had submitted candidate form, please wait until approved by Admin');
        }

        return redirect()->route('member.daftar.kandidat.agreement.index');
    }
}
