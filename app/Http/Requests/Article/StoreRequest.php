<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'title' => ['required', 'min:3', 'max:80'],
                'url' => ['required', 'min:3', 'max:80', 'unique:articles,url'],
                'description' => ['required', 'min:25', 'max:255'],
                'content' => ['required', 'min:50'],
        ];
    }
}
