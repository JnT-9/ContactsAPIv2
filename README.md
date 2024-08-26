# Projet ContactsAPIv2

Ce projet est une API RESTful pour gérer des contacts, construite avec Laravel. Il permet de créer, lire, mettre à jour et supprimer des contacts.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- [PHP](https://www.php.net/) (version 8.0 ou supérieure)
- [Composer](https://getcomposer.org/) (gestionnaire de dépendances PHP)
- [MySQL](https://www.mysql.com/) (ou un autre SGBD compatible avec Laravel)
- [Laravel](https://laravel.com/) (installé via Composer)

## Installation

1. **Clonez le dépôt :**

    ```bash
    git clone https://github.com/JnT-9/ContactsAPIv2.git
    cd ContactsAPIv2
    ```

2. **Installez les dépendances :**

    ```bash
    composer install
    ```

3. **Créez un fichier `.env` basé sur le fichier `.env.example` :**

    ```bash
    cp .env.example .env
    ```

4. **Générez une clé d'application Laravel :**

    ```bash
    php artisan key:generate
    ```

5. **Configurez votre base de données dans le fichier `.env` :**

    Modifiez les variables suivantes dans le fichier `.env` avec les informations de votre base de données :

    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=D:\Saabre\ContactsAPIv2\contactsAPI.db
    DB_USERNAME=root
    DB_PASSWORD=saabre
    ```

## Utilisation

1. **Démarrez le serveur de développement :**

    ```bash
    php artisan serve
    ```

    Le serveur sera accessible à l'adresse `http://localhost:8000`.

2. **Endpoints disponibles :**

    - **GET /contacts** : Récupère la liste de tous les contacts.
    - **POST /contacts** : Crée un nouveau contact. Les données doivent être envoyées dans le corps de la requête en JSON.
    - **GET /contacts/{id}** : Récupère les détails d'un contact spécifique par ID.
    - **PUT /contacts/{id}** : Met à jour un contact spécifique par ID. Les données doivent être envoyées dans le corps de la requête en JSON.
    - **DELETE /contacts/{id}** : Supprime un contact spécifique par ID.

## Exemple de Requêtes

### Créer un Contact

**URL :** `POST /contacts`

**Corps de la requête :**

```json
{
    "prenom": "Jean",
    "nom": "DUPONT",
    "email": "jean.dupont@example.com",
    "telephone": "0123456789",
    "ville": "Paris"
}
```

### Récupérer Tous les Contacts

**URL :** `GET /contacts`

### Mettre à Jour un Contact

**URL :** `PUT /contacts/{id}`

Corps de la requête :

```json
{
    "prenom": "Jean",
    "nom": "DUPONT",
    "email": "jean.dupont@example.com",
    "telephone": "0123456789",
    "ville": "Marseille"
}
```

### Supprimer un Contact

**URL :** `DELETE /contacts/{id}`
