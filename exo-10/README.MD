# PHP orienté objet


## Installation

Après avoir cloné ce dépôt entrez dans le dossier du projet et exécutez la commande:

```sh
composer install
```

Ensuite faites une copie du fichier `.env.example` en le renommant `.env`.  
Editez ce fichier `.env` pour renseigner votre identifiant et mot de passe de connection à la base de données.  

Pour créer la base de données et la table associée exécutez le fichier `migration.sql` avec mysql:

```sh
mysql> source migration.sql
```