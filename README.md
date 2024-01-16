## A propos

Cette application web a été crée pour digitaliser les feuilles de personnages du jeux de roles "Vampire la mascarade".
Elle permet également aux joueurs d'avoir des informations concernant les mécaniques de ce jeu de rôles.

Cette application a été développée selon les règles de la 5ème édition du jeu.

## Fonctionnalités

Cette application permet aux joueurs de :
- Gérer leurs personnages .
- Avoir des informations détaillées sur les attributs de leur personnage

Cette application permet aux maîtres de jeux de :
- Avoir la vision de tous les personnages d'une chronique.
- Créer de nouvelles chroniques et y associer des joueurs
- Gérer les différents joueurs et les personnages auquels ils ont accès

## Technologies

Cette application a été crée grace aux technologies suivantes:

- Laravel 10
- InertiaJs
- Vue 3 (composition API)
- PestPHP
- Vite

Les outils d'analyse suivants sont utilisés :

- Laravel PINT : verification et correction des conventions de codage

## Lancer le projet en local

Pour utiliser le projet en local il faut réaliser les tâches suivantes :

- Créer un fichier .env dans votre projet en prenant comme exemple le fichier .env.example
- Installer les dépendances backend du projet : `composer install`
- Renseigner les informations liées à votre base de données locale (MySQL, SQLite ou autre)
- Executer la commande artisan : ``php artisan migrate:fresh --seed``
- Installer les dépendances frontend du projet : `npm install`
- Exécuter la commande : `npm run dev`
- Exécuter la commande : `php artisan serve`
