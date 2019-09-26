<?php

echo "------------------- EXO 1 ------------------- <br> <br>";
## Je voudrais pouvoir afficher "Je suis en cours de PHP"
echo "Je suis en cours de PHP<br><br>";


echo "------------------- EXO 2 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER "PLUS" si $a est superieure a 30;
$a = 31;
if($a>30){
    echo "Plus<br><br>";
}


echo "------------------- EXO 2 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER LA TAILLE DE LA STRING QUE CONTIENT $a;
$a = "anticonstitutionnellement";
echo strlen($a);
echo"<br><br>";

echo "------------------- EXO 3 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER CHAQUE ENTREE DE LA VARIABLE $a;
## SEULEMENT JE VOUDRAIS FAIRE UN SAUT DE LIT APRES CHAQUE ENTREE;
$a = ["Tomate", "Melon", "Banane", "Orange"];
$i = count($a);
for($x = 0; $x < $i ; $x++) {
    echo $a[$x];
    echo "<br><br>";
}


echo "------------------- EXO 4 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER CHAQUE ENTREE DE LA VARIABLE $a;
## JE VOUDRAIS AFFICHER LA CLE DU TABLEAU AVANT DAFFICHER LENTREE DU TABLEAU
## !TIPS regarder la propierete *key* de la fonction foreach
$a = ["Tomate", "Melon", "Banane", "Orange"];
foreach ($a as $key =>$value){
    echo $key."-".$value."<br><br>";
}


echo "------------------- EXO 5 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER CHAQUE ENTREE DE LA VARIABLE $a;
### MAIS SEULEMENT SI LA TAILLE DE LA STRING FAIT PLUS DE 6 ET EN REVENANT A LA LIGNE A CHAQUE FOIS
$a = ["Tomate", "Melon", "Banane", "Orange", "Fraise", "Mangue", "Poire", "Framboise"];
foreach ($a as $key =>$value){
    if(strlen($value)>6){
        echo $value."<br><br>";
    }
}


echo "------------------- EXO 6 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER CHAQUE ENTREE DE LA VARIABLE $a;
### MAIS SANS UTILISER _LE MOT CLE FOREACH ET EN REVENANT A LA LIGNE A CHAQUE FOIS
$a = ["Tomate", "Melon", "Banane", "Orange", "Fraise", "Mangue", "Poire", "Framboise"];
$i = count($a);
for($x = 0; $x < $i ; $x++) {
    echo $a[$x];
    echo "<br><br>";
};


echo "------------------- EXO 7 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER LA VALEUR "name" du tableau $a
# TIPS : https://www.php.net/manual/fr/function.array.php
$a = ["name" => "Thomas"];
echo $a["name"]."<br><br>";


echo "------------------- EXO 8 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER LA PHRASE "Je suis à L"iim" EN UTILISANT LA VARIABLE $a DANS LA STRING;
$a = "IIM";
echo "Je suis à l'".$a."<br>";


echo "------------------- EXO 9 ------------------- <br> <br>";
### JE VOUDRAIS REMPLACER "GOOGLE" PAR "AMAZON" DANS LA VARIABLE $a ET AFFICHER LA VARIABLE $a
$a = "GOOGLE est la plus grande entreprise du monde";
echo str_replace("GOOGLE","Amazon",$a)."<br><br>";

echo "------------------- EXO 10 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER "TERNAIRE" SI $a est EGAL A "PHP" SANS UTILISE IF OU ELSE
## !TIPS : CHERCHER LES CONDITIONS *TERNAIRES* EN PHP
$a = "PHP";
echo ($a=="PHP")?"TERNAIRE<br>":"PHP<br><br>";



echo "------------------- EXO 11 ------------------- <br> <br>";
### JE VOUDRAIS EXECUTER LA FUNCTION HELLO
function hello()
{
    echo "Halo";
}
hello();
echo "<br><br>";

echo "------------------- EXO 12 ------------------- <br> <br>";
### JE VOUDRAIS EXECUTER LA FUNCTION HELLO2 ET RECUPERER LE RESULTAT DE LA FONCTION DANS UNE VARIABLE $a ET ENSUITE AFFICHER $a
function hello2()
{
    return "Halo";
}
$a=hello2();
echo $a;
echo "<br><br>";

echo "------------------- EXO 13 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER UNE PHRASE AVEC TOUTES LES ENTREES DU TABLES $a AVEC UN ESPACE ENTRE CHAQUE MOT;
echo "$a Je m'appelle Prameet";
echo "<br><br>";

echo "------------------- EXO 14 ------------------- <br> <br>";
### JE VOUDRAIS RECUPERER UN TABLEAU DEPUIS LA STRING $a;
$a = "Le PHP c'est trop bien";
$b = array($a);
echo "<br>";
var_dump($b);
echo "<br><br>";

echo "------------------- EXO 15 ------------------- <br> <br>";
### JE VOUDRAIS EXECUTER LA FUNCTION DISPLAY QUI AFFICHER L'ARGUMENT PASSER A LA FUNCTION
## ATTENTION VOUS DEVEZ CREE LA FUNCTION DISPLAY

function display($arg){
    echo $arg."<br><br>";
}

display("Display");

echo "------------------- EXO 16 ------------------- <br> <br>";
### JE VOUDRAIS EXECUTER LA FUNCTION AVERAGE QUI FERAS LA MOYENNE DU TABLEAU PASSER EN PARAMETRE
#TIPS : chercher la function array_sum() sur la doc de PHP
function average($arg){
    $i =array_sum($arg)/count($arg);
    echo $i."<br><br>";
}
average([2, 2, 4]);


echo "------------------- EXO 17 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER
# "i = 1" si est $i égal 1
# "i = 2" si $i est égal a 2
# "i = 3" si $i est égal a 3
# SI AUCUN DES CAS ALORS AFFICHER = "Aucune des posibilités"
## je veux que vous utilisiez le SWITCH de php
## !TIPS : https://www.php.net/manual/fr/control-structures.switch.php
$i=2;
switch ($i){
    case ($i==1):
        echo "i = 1";
        break;
    case ($i==2):
        echo "i = 2";
        break;
    case ($i==3):
        echo "i = 3";
        break;
    default:
        echo "Aucune des posibilités";
        break;
}
echo "<br><br>";


echo "------------------- EXO 18 ------------------- <br> <br>";
### Si j'execute la function inverse en lui donnant 0 en parametre, la function me renvoie une Exception, je voudrais pouvoir recuperer cette exception et l'afficher
## !TIPS : UTILISER TRY CATCH EN PHP : https://www.php.net/manual/fr/language.exceptions.php
function inverse($x)
{
    if (!$x) {
        throw new Exception('Division par zéro.<br>');
    }
    
    return 1 / $x;
}
try {
    echo inverse(1) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
echo "<br>";
echo "------------------- EXO 19 ------------------- <br> <br>";
## JE VEUX AFFICHER LE USER AGENT DU CLIENT ET LE HOST DU SERVEUR
## TIPS : https://www.php.net/manual/fr/reserved.variables.server.php
echo $_SERVER['HTTP_USER_AGENT']."<br><br>".$_SERVER['HTTP_HOST'];








