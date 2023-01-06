<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\Admin\SkillStoreRequest;
use App\Http\Requests\Skill\Admin\SkillUpdateRequest;
use App\Models\SkillList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SkillController extends Controller
{
    private $page_title = 'Skill - Admin CP';

    public function __construct()
    {
        $this->middleware('can:manage-skill')->only('index');
        $this->middleware('can:create-skill')->only('create', 'store');
        $this->middleware('can:edit-skill')->only('edit', 'update');
        $this->middleware('can:delete-skill')->only('destroy');
    }

    public function index(Request $request)
    {
        $skills = new SkillList();

        if ($request->has('q')) {
            $q = Str::lower($request->q);
            $skills = $skills->where('name', 'LIKE', '%' . $q . '%');
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
            if ($request->sort == 'name') {
                $sortby = 'name';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('admin.skill.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'skills' => $skills->orderBy($sortby, $orderby)->paginate(20),
        ]);
    }

    public function store(SkillStoreRequest $storeRequest)
    {
        $validated = $storeRequest->validated();

        SkillList::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.skill.index');
    }

    public function create()
    {
        //
    }

    public function edit(SkillList $skill)
    {
        //
    }

    public function update(SkillUpdateRequest $updateRequest, SkillList $skill)
    {
        $validated = $updateRequest->validated();

        $skill->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.skill.index');
    }

    public function destroy(SkillList $skill)
    {
        if ($skill->job_skill()->count() > 0) {
            Alert::toast('Ada lowongan yang menggunakan skill ini!', 'warning');
        } else {
            $skill->delete();
            Alert::toast('Successful', 'success');
        }

        return redirect()->route('admin.skill.index');
    }
}
