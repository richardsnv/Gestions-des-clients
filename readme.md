# Documentation du projet

Ce document fournit une vue d'ensemble du projet, y compris sa structure, les tables de base de données utilisées, les bonnes pratiques suivies, et des informations sur la licence et le contact.

## Structure du projet

- `inscription.php` : Page d'inscription des utilisateurs.
- `pg_login.php` : Page de connexion.
- `index.php` : Page d'accueil après connexion.
- `pg_consultation_client.php` : Consultation et recherche des clients par catégorie.
- `database.php` : Fichier de connexion à la base de données.
- `config.php` : Paramètres de connexion à la base.
- `schema.sql` : Script SQL pour créer les tables nécessaires.

## Tables principales

- **inscription** : Stocke les informations des utilisateurs (nom, prénom, email, mot de passe haché, etc.).
- **client** : Stocke les informations des clients.
- **categorie** : Liste des catégories de clients.

## Bonnes pratiques

- Validez et nettoyez toutes les données reçues des formulaires.
- Protégez les pages sensibles par une vérification de session.
- Utilisez des requêtes préparées pour éviter les injections SQL.

## Licence

Ce projet est open source et disponible sous licence MIT.

## Contact

Pour toute question ou suggestion, contactez l'auteur via l'onglet "Issues" du dépôt GitHub.
