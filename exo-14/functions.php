<?php

// Exercice 1
function helloworld() : string {
  return 'Hello World !';
}

// Exercice 2
function jeRetourneMonArgument($it) {
  return $it;
}

// Exercice 3
function concatenation(string $pre, string $post) : string {
  return $pre.$post;
}

// Exercice 4
function concatenationAvecEspace(string $pre, string $post) : string {
  return $pre.' '.$post;
}

// Exercice 5
function somme(int $a, int $b) : int {
  return $a + $b;
}

// Exercice 6
function soustraction(int $a, int $b) : int {
  return $a - $b;
}

// Exercice 7
function multiplication(int $a, int $b) : int {
  return $a * $b;
}

// Exercice 8
function estIlMajeure(int $age) : bool {
  return $age >= 18;
}

// Exercice 9
function plusGrand(int $a, int $b) : int {
  return $a > $b ? $a : $b;
}

// Exercice 10
function plusPetit(int $a, int $b) : int {
  return $a < $b ? $a : $b;
}

// Exercice 11
function premierElementTableau(array $list) {
  return array_shift($list);
}

// Exercice 12
function dernierElementTableau(array $list) {
  return array_pop($list);
}

// Exercice 13
function plusGrand2(array $list) : int {
  if (empty($list)){ return null; }
  return array_reduce($list, function ($memo, $value){
    return $value > $memo ? $value : $memo;
  }, 0);
}

// Exercice 14
function plusPetit2(array $list) : int {
  if (empty($list)){ return null; }
  return array_reduce($list, function ($memo, $value){
    return $value < $memo ? $value : $memo;
  }, PHP_INT_MAX);
}

// Exercice 15
function verificationPassword(string $pass) : bool {
  return strlen($pass) >= 8
    && preg_match('#[[:digit:]]#', $pass)
    && preg_match('#[[:lower:]]#', $pass)
    && preg_match('#[[:upper:]]#', $pass);
}

// Exercice 16
function capital(string $pays) : string {
  switch ($pays){
    case 'France':     return 'Paris';
    case 'Allemagne':  return 'Berlin';
    case 'Italie':     return 'Rome';
    case 'Maroc':      return 'Rabat';
    case 'Espagne':    return 'Madrid';
    case 'Portugal':   return 'Lisbonne';
    case 'Angleterre': return 'Londres';
    default:           return 'Inconnu';
  }
}

// Exercice 17
function listHTML(string $title, array $items) : string {
  if (empty($title) || empty($items)){ return null; }
  $list = array_reduce($items, function($memo, $item) {
    return $memo.'<li>'.$item.'</li>';
  }, '');
  return '<h3>'.$title.'</h3><ul>'.$list.'</ul>';
}

// Exercice 18
function remplacerLesLettres(string $text) : string {
  return preg_replace(
    ['#e#', '#i#', '#o#'],
    ['3',   '1',   '0'],
    $text
  );
}

// Exercice 19
function quelleAnnee() : int {
  return (int) date('Y');
}

// Exercice 20
function quelleDate() : string {
  return date('d/m/Y');
}
