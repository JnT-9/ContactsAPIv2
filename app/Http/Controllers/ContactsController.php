<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Affiche une liste de toutes les ressources.
     */
    public function index()
    {
        // Récupérer et retourner tous les contacts
        return Contact::all();
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     * (Non implémenté dans cet exemple)
     */
    public function create()
    {
        // Méthode non utilisée pour l'instant
    }

    /**
     * Stocke une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:50',
            'nom' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:contacts',
            'telephone' => 'required|string|regex:/^\d{10}$/',
            'ville' => 'required|in:Paris,Lyon,Marseille',
        ]);

        // Convertir le nom en majuscules
        $validatedData['nom'] = strtoupper($validatedData['nom']);

        // Créer et retourner le nouveau contact
        $contact = Contact::create($validatedData);
        return response()->json($contact, 201);
    }

    /**
     * Affiche une ressource spécifique.
     */
    public function show($id)
    {
        // Trouver le contact par son ID
        $contact = Contact::find($id);

        // Vérifier si le contact existe et retourner la réponse appropriée
        return $contact
            ? response()->json($contact)
            : response()->json(['message' => 'Contact not found'], 404);
    }

    /**
     * Affiche le formulaire pour éditer une ressource spécifique.
     * (Non implémenté dans cet exemple)
     */
    public function edit(string $id)
    {
        // Méthode non utilisée pour l'instant
    }

    /**
     * Met à jour une ressource spécifique dans la base de données.
     */
    public function update(Request $request, $id)
    {
        // Trouver le contact par son ID
        $contact = Contact::find($id);

        // Retourner une erreur si le contact n'existe pas
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        // Valider les données de la requête pour la mise à jour
        $validatedData = $request->validate([
            'prenom' => 'string|max:50',
            'nom' => 'string|max:50',
            'email' => 'string|email|max:255|unique:contacts,email,' . $id,
            'telephone' => 'string|regex:/^\d{10}$/',
            'ville' => 'in:Paris,Lyon,Marseille',
        ]);

        // Mettre à jour le nom en majuscules s'il est fourni
        $validatedData['nom'] = strtoupper($validatedData['nom'] ?? $contact->nom);

        // Mettre à jour le contact et retourner la réponse
        $contact->update($validatedData);
        return response()->json($contact, 200);
    }

    /**
     * Supprime une ressource spécifique de la base de données.
     */
    public function destroy($id)
    {
        // Trouver le contact par son ID
        $contact = Contact::find($id);

        // Retourner une erreur si le contact n'existe pas
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        // Supprimer le contact et retourner une réponse 204 No Content
        $contact->delete();
        return response()->json(null, 204);
    }
}
