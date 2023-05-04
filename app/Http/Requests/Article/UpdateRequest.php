<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Vrať validační pravidla pro formulář, který má na starosti editaci článků.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:80'],
            'url' => [
                'required',
                'min:3',
                'max:80',
                Rule::unique('articles', 'url')->ignore($this->route('article')->id),
            ],
            'description' => ['required', 'min:25', 'max:255'],
            'content' => ['required', 'min:50'],
        ];
    }
}
