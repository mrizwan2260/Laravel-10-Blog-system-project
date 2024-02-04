<?php

namespace App\Http\Requests\Auth\Tag;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:25', 'unique:tags,name']
        ];
    }
}
