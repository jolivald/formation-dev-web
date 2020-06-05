# PetNet server

## Installation

Installer docker.  
Installer les dépendances avec: `npm install`  
Démarrer le serveur de développement: `docker-compose up`  


# REST API

| method | path      | content type | accept |
|--------|-----------|:------------:|:------:|
| GET    | /         | html         | null   |
| GET    | /logout   | html         | null   |
| POST   | /login    | json         | json   |
| POST   | /register | json         | json   |
| POST   | /animal   | json         | json   |


