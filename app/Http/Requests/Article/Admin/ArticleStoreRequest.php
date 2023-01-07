<?php

namespace App\Http\Requests\Article\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create-article');
    }

    public function rules()
    {
        return [
            'artImage' => ['required', 'image', 'dimensions:min_width=500,min_height=300'],
            'artTitle' => ['required', 'string', 'max:100'],
            'artContent' => ['required', 'string', 'max:65535']
        ];
    }

    public function attributes()
    {
        return [
            'artImage' => 'article image',
            'artTitle' => 'article title',
            'artContent' => 'article content',
        ];
    }
}
