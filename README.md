# Gestionnaire de Tâches

Ce projet PHP propose une architecture simple MVC pour effectuer des opérations CRUD sur des tâches.
Il comprend :

- Création, lecture, mise à jour, suppression de tâches
- Affichage d'une tâche individuelle
- Export PDF des tâches en cours via Dompdf

## Structure

```
project/
├─ src/
│  ├─ Controller/
│  │  └─ TaskController.php
│  ├─ Model/
│  │  └─ Task.php
│  └─ View/
│     ├─ header.php
│     ├─ footer.php
│     └─ tasks/
│        ├─ list.php
│        ├─ show.php
│        └─ form.php
├─ public/
│  ├─ index.php
│  ├─ css/
│  └─ js/
├─ database.sql
├─ composer.json
└─ README.md
```

## Installation

1. Clone le projet et place-le dans ton serveur PHP (ex : `htdocs` ou `www`).
2. Exécute `composer install` pour installer **Dompdf**.
3. Configure la connexion à la base de données dans `src/Model/Task.php`.
4. Importer `database.sql` dans votre base MySQL.

## Usage

- Visite `public/index.php` pour voir la liste des tâches.
- Utilise les formulaires pour ajouter/modifier/supprimer des tâches.
- Clique sur "Exporter en PDF" pour générer un PDF des tâches en cours.

## Base de données
Voir le fichier `database.sql` pour la structure.
