<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Middleware\CorsMiddleware;

// Appliquer le middleware CORS à toutes les routes
Route::middleware(CorsMiddleware::class)->group(function () {
    // Route pour obtenir tous les contacts
    Route::get('/contacts', [ContactsController::class, 'index']);

    // Route pour créer un nouveau contact
    Route::post('/contacts', [ContactsController::class, 'store']);

    // Route pour obtenir un contact spécifique par son ID
    Route::get('/contacts/{id}', [ContactsController::class, 'show']);

    // Route pour mettre à jour un contact spécifique par son ID
    Route::put('/contacts/{id}', [ContactsController::class, 'update']);

    // Route pour supprimer un contact spécifique par son ID
    Route::delete('/contacts/{id}', [ContactsController::class, 'destroy']);

    Route::get('/test', function () {
        return response()->json(['message' => 'API is working']);
    });
});
