<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autorise la requête
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'date_de_naissance' => 'required|date',
            'email' => 'required|string|email|max:255|unique:etudiants,email',
            'mot_de_passe' => 'nullable|string|min:8',
            'photo' => 'nullable|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est requis.',
            'prenom.required' => 'Le prénom est requis.',
            'date_de_naissance.required' => 'La date de naissance est requise.',
            'date_de_naissance.date' => 'La date de naissance doit être une date valide.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être valide.',
            'email.unique' => 'L\'email est déjà utilisé.',
            'telephone.string' => 'Le téléphone doit être une chaîne de caractères.',
            'telephone.max' => 'Le téléphone ne doit pas dépasser 20 caractères.',
            'adresse.string' => 'L\'adresse doit être une chaîne de caractères.',
            'adresse.max' => 'L\'adresse ne doit pas dépasser 255 caractères.',
            'matricule.required' => 'Le matricule est requis.',
            'matricule.unique' => 'Le matricule est déjà utilisé.',
            'matricule.max' => 'Le matricule ne doit pas dépasser 255 caractères.',
            'mot_de_passe.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'mot_de_passe.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'photo.string' => 'La photo doit être une chaîne de caractères.',
            'photo.max' => 'La photo ne doit pas dépasser 255 caractères.',
        ];
    }
}
