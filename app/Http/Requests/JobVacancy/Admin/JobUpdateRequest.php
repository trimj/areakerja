<?php

namespace App\Http\Requests\JobVacancy\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->hasRole([1]) || $this->user()->can('update-job-vacancy');
    }

    public function rules()
    {
        return [
            'partner' => ['required', 'exists:partners,id'],

            'jobTitle' => ['required', 'string', 'max:100'],
            'jobDesc' => ['required', 'string', 'max:5000'],

            'jobMainSkill' => ['required', 'numeric', 'exists:skill_lists,id'],
            'jobOtherSkill' => ['nullable', 'array'],
            'jobOtherSkill.*' => ['nullable', 'numeric', 'exists:skill_lists,id'],

            'address' => ['required', 'array', 'max:4'],
            'address.provinsi' => ['required', 'numeric'],
            'address.kota' => ['required', 'numeric'],
            'address.kecamatan' => ['required', 'numeric'],
            'address.kelurahan' => ['required', 'numeric'],

            'jobMinSalary' => ['required', 'numeric'],
            'jobMaxSalary' => ['required', 'numeric'],

            'jobDeadline' => ['required', 'date']
        ];
    }
}
