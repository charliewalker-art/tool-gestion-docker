# 🛠️ Projet de Gestion de Tâches avec Docker

Ce dépôt contient une application PHP légère pour la gestion de tâches, déployée à l'aide de Docker et organisée selon une architecture MVC.

## 📌 Présentation

L'application permet de créer, afficher et gérer des tâches. Elle utilise :

- PHP avec une structure MVC simple
- Docker et Docker Compose pour l'isolation et la facilité de déploiement
- Composer pour la gestion des dépendances

## 🚀 Installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/charliewalker-art/tool-gestion-docker.git
   cd tool-gestion-docker
   ```

2. **Démarrer les conteneurs Docker**
   ```bash
   docker compose up -d --build
   ```
   Les services incluent :
   - `php` : serveur PHP-FPM
   - `nginx` : serveur web
   - `mysql` : base de données

3. **Accéder à l'application**
   Ouvrez votre navigateur sur `http://localhost`.

## 🛠️ Développement

- Le code source se trouve dans `src/` (Controller, Model, View).
- Les dépendances PHP sont gérées via Composer ; exécuter `composer install` si nécessaire.
- Modifiez les fichiers sous `public/` pour ajuster l'interface.

## 🧪 Tests

Aucun test automatique n'est inclus pour le moment. Vous pouvez écrire des tests PHPUnit dans le dossier `tests/`.

## 📁 Structure du projet

```
├── docker/           # configurations Docker
├── nginx/            # configuration Nginx
├── public/           # point d'entrée web
├── src/              # code applicatif (MVC)
└── vendor/           # dépendances Composer
```

## 📖 Ressources utiles

- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [PHP Documentation](https://www.php.net/docs.php)

## 🤝 Contribution

Les contributions sont les bienvenues ! Merci de créer une issue ou un pull request.

---
*Ce README a été généré pour fournir une présentation professionnelle du projet.*