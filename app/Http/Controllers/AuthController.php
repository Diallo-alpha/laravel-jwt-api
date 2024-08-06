<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous d'importer le bon modèle User

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validation
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        // Debug: Check input
        \Log::info('Login attempt', ['email' => $request->email]);

        $token = auth()->attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        // Debug: Check token
        \Log::info('Login result', ['token' => $token]);

        if (!$token) {
            return response()->json([
                "status" => false,
                "message" => "Données invalid"
            ], 401); // Add a 401 Unauthorized status code
        }

        return response()->json([
            "status" => true,
            "message" => "Connexion Réuissi",
            "token" => $token,
            //"expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }

    // Profile API - GET (JWT Auth Token)
    public function profile()
    {
        $userData = request()->user();

        return response()->json([
            "status" => true,
            "message" => "Profile data",
            "data" => $userData,
            //"user_id" => request()->user()->id,
            //"email" => request()->user()->email
        ]);
    }

    // Refresh Token API - GET (JWT Auth Token)
    public function refreshToken()
    {
        $token = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "New access token",
            "token" => $token,
            //"expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }

    // Logout API - GET (JWT Auth Token)
    public function logout()
    {
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "Déconnection Réuisse"
        ]);
    }
}
