<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'number' => 'required|numeric',
            'email' => 'required|email',
            'formation_id' => 'required|numeric|exists:formations,id',
            'groups' => 'nullable|array',
            'groups.*' => 'integer|exists:groups,id'
        ];
    }
}
