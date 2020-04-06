# Exercices de pseudo code

1. [Inversion du contenu de deux variables mémoires](#inversion-du-contenu-de-deux-variables-mémoires)  
2. [Comparaison surface de deux cercles](#comparaison-surface-de-deux-cercles)  
3. [Surface et volume d'une sphere](#surface-et-volume-dune-sphere)  
4. [Affichage de la longueur d'un nom](#affichage-de-la-longueur-dun-nom)  
5. [Polynôme du second degré](#polynôme-du-second-degré)  


## Inversion du contenu de deux variables mémoires

Il vous est demandé d'inverser le contenu de deux variables mémoire.  
La première variable se nomme a et la seconde b.  
La valeur initiale de a est 5 et celle de b est 3.  

```
a ← 5
b ← 3
c ← a
a ← b
b ← c
```


## Comparaison surface de deux cercles

Calculer et afficher à l'écran la surface de deux cercles de rayons prédéterminés 
ainsi que la différence entre ces deux surfaces.

```
PI ← 3,14159
rayon_1 ← 1337
rayon_2 ← 420
aire_1 ← PI * rayon_1 ^ 2
aire_2 ← PI * rayon_2 ^ 2
diff ← aire_1 - aire_2
Écrire aire_1
Écrire aire_2
Écrire diff
```


## Surface et volume d'une sphere

Calculer et afficher la surface et le volume d'une sphère dont la valeur du rayon sera saisie au clavier.  
Une phrase de commentaire sera déclarée pour chaque opération.

```
// déclare la constante PI
PI ← 3,14159
// l'utilisateur fourni la valeur du rayon
Lire rayon
// calcule de la surface de la sphere
surface ← 4 * PI * (rayon ^ 2)
// calcul du volume de la sphere
volume ← (4/3) * PI * (rayon ^ 3)
// affichage de la surface
Écrire surface
// affichage du volume
Écrire volume
```


## Affichage de la longueur d'un nom

Ecrire un algorithme permettant la saisie au clavier d'une entrée pour afficher le
nombre de caractères qu’elle possède.  
Une fonction Longueur(variable_chaîne) prédéfinie sera utilisée pour déterminer le nombre de caractère.

```
Lire texte
nombre ← Longueur(texte)
Écrire nombre
```


## Polynôme du second degré

Calculer les racines d'un polynôme du 2nd degré Ax²+Bx+C (avec A<>0 dans l'absolu mais ce test ne sera pas effectué ici).  
Les valeurs A,B et C seront saisies au clavier.  
Une phrase de commentaire sera déclarée pour chaque opération.

```
// l'utilisateur fourni la valeur du coeficient a
Lire a
// l'utilisateur fourni la valeur du coeficient b
Lire b
// l'utilisateur fourni la valeur du coeficient c
Lire c
// calcule le discriminant du polynôme
delta ← (b ^ 2) - (4 * a * c)
// si le polynôme a deux racines
SI delta > 0 ALORS
  // on calcule la première racine
  racine_1 ← (-b + Sqrt(delta)) / (2 * a)
  // on calcule la deuxième racine
  racine_2 ← (-b - Sqrt(delta)) / (2 * a)
// si le polynôme n'a qu'une racine
SINON SI delta == 0 ALORS
  // on calcule l'unique racine
  racine ← -b / (2 * a)
// sinon le polynôme n'a pas de racine
SINON
  // message d'information
  Écrire "Ce polynôme n'a pas de racine"
FIN SI
```
