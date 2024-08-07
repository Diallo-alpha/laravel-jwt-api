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
            'date_debut' => 'sometimes|required|date',
            'date_fin' => 'sometimes|required|date',
            'coef' => 'sometimes|required|integer',
            'libelle' => 'sometimes|required|string|max:255|unique:ues,libelle,' . $this->ue->id,
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
            'date_debut.required' => 'La date de début est requise.',
            'date_fin.required' => 'La date de fin est requise.',
            'coef.required' => 'Le coefficient est requis.',
            'coef.integer' => 'Le coefficient doit être un nombre entier.',
            'libelle.required' => 'Le libellé est requis.',
            'libelle.unique' => 'Le libellé est déjà utilisé.',
        ];
    }
}
