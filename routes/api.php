<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\UeController;
use Illuminate\Support\Facades\Route;


// Routes d'authentification
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function(){
    // Routes de profil, de rafraîchissement et de déconnexion
    Route::get("profile", [AuthController::class, "profile"]);
    Route::get("refresh", [AuthController::class, "refreshToken"]);
    Route::get("logout", [AuthController::class, "logout"]);

    // Routes CRUD pour les matières
    Route::prefix('matieres')->group(function () {
        Route::get('/', [MatiereController::class, 'index']); // Récupérer toutes les matières
        Route::post('/', [MatiereController::class, 'store']); // Créer une nouvelle matière
        Route::get('/{matiere}', [MatiereController::class, 'show']); // Afficher une matière spécifique
        Route::put('/{matiere}', [MatiereController::class, 'update']); // Mettre à jour une matière
        Route::delete('/{matiere}', [MatiereController::class, 'destroy']); // Supprimer une matière
    });
    // Routes CRUD pour les évalations
    Route::prefix('evaluations')->group(function () {
        Route::get('/', [EvaluationController::class, 'index']); // Récupérer toutes les évaluations
        Route::post('/', [EvaluationController::class, 'store']); // Créer une nouvelle évaluation
        Route::get('/{evaluation}', [EvaluationController::class, 'show']); // Afficher une évaluation spécifique
        Route::put('/{evaluation}', [EvaluationController::class, 'update']); // Mettre à jour une évaluation
        Route::delete('/{evaluation}', [EvaluationController::class, 'destroy']); // Supprimer une évaluation
    });
    //Routes CRUD pour les étudiants
    Route::prefix('etudiants')->group(function () {
        Route::get('/', [EtudiantController::class, 'index']); // Récupérer tous les étudiants
        Route::post('/', [EtudiantController::class, 'store']); // Créer un nouvel étudiant
        Route::get('/{etudiant}', [EtudiantController::class, 'show']); // Afficher un étudiant spécifique
        Route::put('/{etudiant}', [EtudiantController::class, 'update']); // Mettre à jour un étudiant
        Route::delete('/{etudiant}', [EtudiantController::class, 'destroy']); // Supprimer un étudiant
    });
    //uniter de enseignements
    Route::prefix('ues')->group(function () {
        Route::get('/', [UeController::class, 'index']); // Récupérer toutes les unités d'enseignement
        Route::post('/', [UeController::class, 'store']); // Créer une nouvelle unité d'enseignement
        Route::get('/{ue}', [UeController::class, 'show']); // Afficher une unité d'enseignement spécifique
        Route::put('/{ue}', [UeController::class, 'update']); // Mettre à jour une unité d'enseignement
        Route::delete('/{ue}', [UeController::class, 'destroy']); // Supprimer une unité d'enseignement
    });
});
