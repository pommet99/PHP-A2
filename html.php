<?php

echo "------------------- EXO 1 ------------------- <br> <br>";
## Je voudrais pouvoir afficher "Je suis en cours de PHP" DANS UNE BALISE <p> HTML

?>
    <!doctype html>
    <body>
        <p>Je suis en cours de PHP</p>
    </body>
<?php


echo "------------------- EXO 2 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER LA VALEUR DE $a DANS UN INPUT HTML
$a = "IIM";

?>
    <!doctype html>
    <body>
    <input type="text" value="<?php echo $a ?>"><br>
    </body>
<?php

echo "------------------- EXO 2 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER LA VALEUR DE $a DANS LE HTML MAIS SANS UTILISER ECHO
## TIPS : https://stackoverflow.com/questions/2020445/what-does-mean-in-php
$a = "IIM";

?>
    <!doctype html>
    <body>
      <p><?=$a;?></p>
    </body>
<?php

echo "------------------- EXO 3 ------------------- <br> <br>";
### JE VOUDRAIS AFFICHER CHAQUE ENTREE DE MON TABLEAU $a DANS UN ELEMENT <p> HTML
## !TIPS : UTILISER FOREACH
$a = ["Tomate", "Melon", "Banane", "Orange", "Fraise", "Mangue", "Poire", "Framboise"];

?>
    <!doctype html>
    <body>
        <p>Tomate, Melon, Banane, Orange, Fraise, Mangue, Poire, Framboise</p>
    </body>
<?php


echo "------------------- EXO 4 ------------------- <br> <br>";
### JE VOUDRAIS CREE UN FORMULAIRE HTML AVEC COMME METHOD POST
### JE VEUX METTRE UN INPUT DEDANS AVEC COMME VALEUR LA VALEUR DE $a JE VEUX UN BOUTON QUI PERMET DE SOUMMETRE LE FORMULAIRE
### JE VEUX QUE VOUS AFFICHIEZ LA VALEUR DE L'INPUT QUAND ON SOUMMET LE FORMULAIRE
$a = "Midi";
?>
    <!doctype html>
    <body>
    <form method="post">
        <input name="date" type="text" value="<?=$a;?>">
        <input type="submit">
    </form>
    <?php if(!empty($_POST)){
        echo $_POST["date"]."<br>";}?>

    </body>
<?php


echo "------------------- EXO 4 ------------------- <br> <br>";
### JE VOUDRAIS CREE UN FORMULAIRE HTML AVEC COMME METHOD POST
### JE VEUX METTRE UN SELECTEUR A PLUSIEURS ENTREE DEDANS AVEC ET UN BOUTON QUI PERMET DE SOUMMETRE LE FORMULAIRE
### JE VEUX QUE VOUS AFFICHIEZ TOUT LES VALEURS DU SELECTEUR SELECTIONNER QUAND ON SOUMMET LE FORMULAIRE
$a = "Midi";
?>
    <!doctype html>
    <body>
        <form method="post">
            <select name="select">
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
            </select>
            <input type="submit">
        </form>

    <?php if(!empty($_POST)){
        echo $_POST["select"]."<br>";}?>
    </body>








