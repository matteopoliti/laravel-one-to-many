<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project), 'max:150'
            ],
            'description' => ['nullable'],
            'project_start_date' => ['nullable'],
            'cover_image' => ['nullable', 'image'],
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
}
