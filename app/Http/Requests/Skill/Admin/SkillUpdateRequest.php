<?php

namespace App\Http\Requests\Skill\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update-skill');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:30'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'skill name',
        ];
    }
}
