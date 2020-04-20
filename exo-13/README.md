# Projet criminels

## CONSIGNES

Vous êtes chargé de concevoir une interface permettant d’interroger ou remplir la base de données criminels. Il vous est interdit de modifier le modèle physique de la base de données.
Vous devez programmer en orienté objet
Il existe déjà trois agents A, B et C en base dont les mots de passe sont respectivement:
 __theonlyone__ , __poulidor__ et __agent__. Ces mots de passe ont été hashé grâce à password_hash().


## DESIGN PATTERN

Vous utiliserez le modèle MVC suivant:

 * index.php
 * views /templates         (templates et les vues des formulaires et des fiches criminels)
 * class              	 (contiendra les classes de l’application)
 * models  	(contenant un fichier par type de requête)
 * controllers	 (contenant le ou les controllers de l’appli)
 * public		(à l'intérieur undossier css/, images/, js/, etc.)

**Un système d’autoloading permettra de charger les classes automatiquement.  
***Vos classes feront toutes parties d’un namespace __votreprenom__


## PLAN DE L’APPLICATION

Une __page index__ permettant de s’identifier sur l’application grâce au pseudo agent et au mot de passe redirigera vers __une interface__ (template) qui s’affichera différemment selon le niveau d’accréditation. 
Vous créerez également un __autre template__ chargé d’afficher la fiche d’un criminel et ses informations 
un template de page backoffice accessible pour agent d’accreditation 1


## FORMULAIRES DE SAISIE ACCREDITATION 1 (backoffice)

Un agent d’accréditation __1__ peut saisir dans la base de donnée:

 * Un agent
 * Un criminel
 * Une condamnation
 * Un témoignage
 * Un signalement
 * Un lien acolyte

Il peut également mettre à jour un agent ou un criminel à partir de son nom.


## FORMULAIRE DE RECHERCHE PAR NOM ET/OU PRENOM ACCREDITATION 1 ET 2

Un agent d’accréditation __1__ ou __2__  peut visualiser l’intégralité des informations d’une fiche criminel.


## FORMULAIRE DE RECHERCHE PAR NOM ET/OU PRENOM ACCREDITATION 3
Un agent d’accréditation __3__  peut visualiser une fiche criminel mais celle-ci ne contiendra que la photo, le nom, le prénom et la dernière adresse connue du loustique ainsi que la liste de ses acolytes connus


## LA FICHE CRIMINEL

Une fiche criminel se compose de toutes les informations du criminel et sa photo ainsi que:
 * la liste de ses acolytes
 * la liste de ses condamnations
 * la liste des témoignages le signalant
