# Exercices de pseudo code 2


## Moyenne

![Enoncé de l'exercice](moyenne.jpg)

```
Lire a
Lire b
Lire c

m <- (a + b) / 2

Si c < m Alors
  Ecrire "La dernière note fait baisser la moyenne."
Sinon
  Ecrire "La dernière note ne fait pas baisser la moyenne."
FinSi
```


## Reçu ou non

![Enoncé de l'exercice](recuOuNon.jpg)

```
Lire x
Lire y
Lire z
Lire t

m <- ((x * 2) + (y * 2) + z + t) / 6

Si m >= 10 Alors
  Ecrire "Candidat reçu à l'examen."
Sinon Si m >= 8 Alors
  Ecrire "Candidat admis à l'oral de rattrapage."
Sinon
  Ecrire "Candidat non reçu à l'examen."
FinSi
```
