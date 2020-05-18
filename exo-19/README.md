# Exercice AJAX

 
Nous allons réaliser un formulaire de connexion utilisateur.  

Créez une base de données ajax_defi  
Créez une table user avec les champs suivants:  
 * id  int 11 AI PRIMARY
 * email varchar 255
 * keypass varchar 255
 * created_at date

Créez un fichier index.php, un fichier home.php et un fichier ajax.php  

Dans index.php vous coderez les deux champs du 
formulaire nécessaire à la connexion: email et keypass.  
Vous y coderez également un bouton qui permet d'enclencher 
une fonction éxecutant une requête ajax jquery.  
En cas de succés de la connexion dans ajax.php, cette requête redirige vers home.php  
En cas d'échec de la connexion ou de la requête en général, cette requête reste sur index.php
avec un message d'échec.  
Appuyez vous sur l'exercice de connexion à un champs que je vous ai fourni ce matin.


En accédant à home.php la session doit être ouverte et je dois pouvoir afficher les valeurs
 `$_SESSION['id']` et `$_SESSION['email']` correspondant à l'utilisateur connecté.

 
## POUR ALLER PLUS LOIN :
Utilisez les champs d'entrées existants et un autre bouton pour enclencher une 
requête qui insère un nouvel utilisateur en base.