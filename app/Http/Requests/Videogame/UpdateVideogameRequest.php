<?php

namespace App\Http\Requests\Videogame;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideogameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required | string | max:255',
            'description' => 'required | string | max: 400',
            'release_date' => 'nullable | date',
            'cover_image' => 'nullable | image | max:2048',
            'consoles' => ['sometimes', 'array'],
            'consoles.*' => ['integer', 'exists:consoles,id'],
        ];
    }
}
