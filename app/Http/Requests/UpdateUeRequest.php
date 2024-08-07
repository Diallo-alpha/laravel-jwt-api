<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to true to allow request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'sometimes|required|string|max:10|unique:ues,code,' . $this->ue->id,
            'intitule' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.required' => 'Le code est requis.',
            'code.unique' => 'Le code est déjà utilisé.',
            'intitule.required' => 'L\'intitulé est requis.',
        ];
    }
}
