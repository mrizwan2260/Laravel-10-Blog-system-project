<?php

namespace App\Http\Requests\Auth\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'image'         => ['nullable', 'mimes:png,jpg,gif,jpeg', 'image'],
            'title'         => ['required', 'max:255', 'string'],
            'description'   => ['required', 'max:3000'],
            'is_publish'    => ['required', 'integer', 'max:255'],
            'category'      => ['required', 'integer', 'max:255'],
            'tags'          => ['required', 'array'],
            'tags.*'        => ['required', 'string', 'max:255'],
        ];
    }
}
