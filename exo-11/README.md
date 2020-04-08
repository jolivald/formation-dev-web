# Conception de base de données

## Enoncé

Nous souhaitons développer une application permettant à un propriétaire de gérer ses bateaux.  

Pour simplifier, un bateau est caractérisé uniquement par un nom, un modèle, une taille et un propriétaire. Chaque bateau possède un carnet de maintenance permettant de gérer le suivi de l'entretien. L'entretien est composé d'un ensemble de catégories : moteur, électricité, électronique, circuit eau douce, coque, gréement (pour les voiliers uniquement). Chaque catégorie est caractérisée par sa périodicité en année, les dates de la dernière et prochaine vérification. Le bateau possède aussi un carnet de bord indiquant l'ensemble des trajets effectués. Un trajet est caractérisé par une liste de ports, ainsi qu'une liste de coordonnées GPS. La liste de ports est au minimum de 2 avec le port d'arrivée et de départ (qui peuvent être les mêmes).


## Questions

 1. Proposez une modélisation complète de l'application.
 2. Déclarez les classes (attributs et méthodes) nécessaires à l’application.
