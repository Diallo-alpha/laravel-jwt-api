<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatiereController;

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
});
