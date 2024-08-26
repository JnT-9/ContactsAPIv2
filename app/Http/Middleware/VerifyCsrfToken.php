<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui doivent être exclues de la vérification CSRF.
     *
     * @var array
     */
    protected $except = [
        'contacts',        // Exclut POST /contacts
        'contacts/*',      // Exclut PUT /contacts/{id}
        'web/*',           // Exclut toutes les routes de l'application web
    ];
}
