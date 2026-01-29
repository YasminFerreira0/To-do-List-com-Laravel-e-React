<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');
        return [
            'title' => $isUpdate
            ? 'sometimes|required'
            : 'required', 

            'description' => 'nullable', 
            
            'status' => $isUpdate
            ? 'sometimes|required'
            : 'required', 

            'priority' => $isUpdate
            ? 'sometimes|required'
            : 'required',

            'due_date' => 'nullable|date',
        ];
    }
}
