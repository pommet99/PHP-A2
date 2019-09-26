<?php
require __DIR__."/vendor/autoload.php";
echo "------------------- EXO 1 ------------------- <br> <br>";
## Je voudrais pouvoir me connecter a ma base de donnée
## VERIFIER BIEN LE NOM DE VOTRE BASE DE DONNEE
## TIPS :
# - MAMP => user : root | mdp : root
# - WAMP => user : root | mdp :

//$pdo = new PDO();
$pdo = new PDO('mysql:host=3306;dbname=exophp1', "root", "");

echo "------------------- EXO 2 ------------------- <br> <br>";
## Je voudrais pouvoir me connecter a ma base de donnée
## Mais que vous regardiez si un erreur c'est produite lors de la connexion, et si il y a un erreur l'afficher
## TIPS : https://www.developpez.net/forums/anocode.php?id=2beaa3cf20b92207f29d6472137a4691

try{
    $pdo = new PDO('mysql:host=3306;dbname=exophp1', "root", "");
} catch (Exception $e){
    echo "erreur de connection à la base de donnée";
}


echo "------------------- EXO 2 ------------------- <br> <br>";
## Je voudrais crée 2 tables, une tables "personnages" et une table "types" dans la base de donnée crée précedement
## DANS LA TABLE PERSONNAGES JE VEUX
# UNE COLUMN ID EN AUTO_INCREMENT
# UNE COLUMN NAME DE TYPE : VARCHAR 255
# UNE COLUMN ATK DE TYPE : INT 11
# UNE COLUMN type_id DE TYPE : INT 11 ET LE RENDRE NULLABLE
# UNE COLUMN PV DE TYPE : INT 11 ET METTRE PAR DEFAUT LA VALEUR 100
    $cp = $pdo->prepare("CREATE TABLE personnages(
        ID INT PRIMARY KEY AUTO_INCREMENT,
        NAME VARCHAR(255),
        ATK INT(11),
        type_id INT(11) NULL,
        PV INT(11) DEFAULT 100)");
    $cp->execute();
$cp = $pdo->prepare("CREATE TABLE personnages(
        ID INT PRIMARY KEY AUTO_INCREMENT,
        NAME VARCHAR(255),
        ATK INT(11),
        type_id INT(11) NULL,
        PV INT(11) DEFAULT 100
        )");
$cp->execute();

## DANS LA TABLE TYPE JE VEUX
# UNE COLUMN ID EN AUTO_INCREMENT
# UNE COLUMN NAME DE TYPE : VARCHAR 255
# UNE COLUMN BONUS DE TYPE : INT 11
$ct = $pdo->prepare("CREATE TABLE type(
        ID INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100),
        bonus INT(11)
)");
$ct->execute();

echo "------------------- EXO 3 ------------------- <br> <br>";
## JE VOUDRAIS CREE UNE ENTREE DANS MA TABLE PERSONNAGES AVEC COMME NAME = "Perso 1" , ATK = 100;
## UTILISER L'OBJ PDO POUR CREE UNE LIGNE EN BASE DE DONNEE
$add_perso=$pdo->prepare('INSERT INTO personnages(NAME ,ATK)VALUE("Perso 1",100 )'
);
$add_perso->execute();
echo "------------------- EXO 4 ------------------- <br> <br>";
## JE VOUDRAIS CREE UNE ENTREE DANS MA TABLE TYPE AVEC COMME NAME = "Feu" , Bonus = 10;
## JE VOUDRAIS CREE UNE AUTRE ENTREE DANS MA TABLE TYPE AVEC COMME NAME = "Eau" , Bonus = 20;
## UTILISER L'OBJ PDO POUR CREE UNE LIGNE EN BASE DE DONNEE
$add_type=$pdo->prepare('INSERT INTO type(name,bonus)VALUE("Feu",10 ),("Eau",20)'
);
echo "------------------- EXO 5 ------------------- <br> <br>";
## JE VOUDRAIS CREE UNE LIGNE DANS LA TABLE PERSONNAGE POUR CHAQUE ENTREE DE MON TABLEAU
## LA CLE CORRESPOND AU NOM
## LA VALEUR A L'ATK
## UTILISER L'OBJ PDO POUR CREE UNE LIGNE EN BASE DE DONNEE
$a = ["Mage Royal" => 10, "Mage Sanguinaire" => 30, "Mage Illusioniste" => 90];
foreach ($a as $name => $atk){
    $add_perso2=$pdo->prepare('INSERT INTO personnages(NAME,ATK)VALUE("'.$name.'",'.$atk.')');
    $add_perso2->execute();
}


echo "------------------- EXO 6 ------------------- <br> <br>";
## CREE UNE ENTREE DANS LA TABLE PERSONNAGE AVEC LES VARIABLES $a et $b
## AVEC $a COMME NAME et $b COMME ATK
## UTILISER L'OBJ PDO POUR CREE UNE LIGNE EN BASE DE DONNEE
$a = "Personnage Puissant";
$b = "203";
$add_perso3=$pdo->prepare('INSERT INTO personnages(NAME,ATK)VALUE("'.$a.'",'.$b.')');
$add_perso3->execute();

echo "------------------- EXO 7 ------------------- <br> <br>";
## RECUPERER TOUT LES PERSONNAGE DE LA TABLES PERSONNAGES ET AFFICHER POUR CHAQUE PERSONNAGE SON ATK ET SON NOM
## UTILISER L'OBJ PDO POUR RECUPERER LES INFORMATIONS DE LA BASE DE DONNEE
$show_stat = $pdo->prepare('SELECT NAME,ATK FROM personnages');
$show_stat->execute();
$status = $show_stat->fetchAll(PDO::FETCH_OBJ);
if (!empty($status)):
   foreach ($status as $key => $value): ?>
        <tr>
            <td>Nom : <?php echo $value->NAME; ?></td>
            <td>ATK : <?php echo $value->ATK; ?></td>
            <br>
        </tr>
    <?php endforeach;
    endif;

echo "------------------- EXO 8 ------------------- <br> <br>";
## RECUPERER TOUT LES PERSONNAGES DE LA TABLE PERSONNAGES MAIS ORDONER LES PAR ID DESCENDANT ET LES AFFICHER UN A UN EN REVENANT A LA LIGNE POUR CHAQUE
## UTILISER L'OBJ PDO POUR RECUPERER LES INFORMATIONS DE LA BASE DE DONNEE
$show_stat2 = $pdo->prepare('SELECT * FROM personnages ORDER BY ID DESC');
$show_stat2->execute();
$status2 = $show_stat->fetchAll(PDO::FETCH_OBJ);
if (!empty($status2)):
    foreach ($status2 as $key => $value): ?>
        <tr>
            <td>Nom : <?php echo $value->NAME; ?></td><br>
            <td>ATK : <?php echo $value->ATK; ?></td>
            <br>
        </tr>
    <?php endforeach;
endif;

echo "------------------- EXO 9 ------------------- <br> <br>";
## RECUPERER TOUT LES TYPES DE LA TABLE TYPES ET LES AFFICHER UN A UN EN REVENANT A LA LIGNE POUR CHAQUE
## UTILISER L'OBJ PDO POUR RECUPERER LES INFORMATIONS DE LA BASE DE DONNEE
$show_type = $pdo->prepare('SELECT * FROM type');
$show_type->execute();
$type = $show_type->fetchAll(PDO::FETCH_OBJ);
if (!empty($type)):
    foreach ($type as $key => $value): ?>
        <tr>
            <td>Nom : <?php echo $value->name; ?></td><br>
                <td>bonus : <?php echo $value->bonus; ?></td>
            <br>
        </tr>
    <?php endforeach;
endif;

echo "------------------- EXO 10 ------------------- <br> <br>";
## CREE UN FORMULAIRE HTML AVEC UN 3 input
#  input type text avec le name = nom
# input type number avec le name = atk
# un selecteur avec comme nom = type
?>
    <form method="post">
        <input name="nom" type="text">
        <input name="atk" type="text">
        <select name="type">
            <option value="feu">feu</option>
            <option value="eau">eau</option>
        </select>
    </form>
<?php
echo "------------------- EXO 11 ------------------- <br> <br>";
## CREE UN FORMULAIRE HTML AVEC UN 3 input
#  input type text avec le name = nom
# input type number avec le name = atk
# un selecteur avec comme nom = type
## AJOUTER UN BOUTON VALIDER AU FORMULAIRE QUI A LE TYPE SUBMIT
## LORSQUE L'on SOUMET LE FORMULAIRE JE VEUX QUE VOUS AFFICHIEZ CHAQUE ENTREE DE LA VARIABLE $_POST
## !TIPS : Si vous avez oubliez ce que contient votre variable $_POST alors pensez a faire un dd($_POST) (mais pensez a require l'autoload en haut de ce fichier.)
?>
<body>
    <form method="post">
        <input name="nom" type="text">
        <input name="atk" type="text">
        <select name="type">
            <option value="feu">feu</option>
            <option value="eau">eau</option>
        </select>
        <input type="submit">
    </form>
    <?php if(!empty($_POST)){
        echo $_POST["nom"]."<br>";
        echo $_POST["atk"]."<br>";
        echo $_POST["type"]."<br>";
    };?>
</body>
<?php
echo "------------------- EXO 12 ------------------- <br> <br>";
## REPRENDRE LE FORMULAIRE FAIT AU DESSUS, AU NIVEAU DU SELECTEUR FAIRE UN FOREACH POUR AFFICHER DANS LE SELECTEUR TOUT LES TYPES DISPONIBLE DANS LA BASE DE DONNEES
;?>

<body>
<select name="type" id="type">
    <?php
    foreach($type as $key => $value):
    ;?>
    <option value="<?php echo $value->name?>"><?php echo $value->name?></option>
    <?php endforeach; ?>
</select><br>
</body>
<?php

echo "------------------- EXO 12 ------------------- <br> <br>";
## REPRENDRE LE FORMULAIRE FAIT AU DESSUS, ET ENREGISTRER UNE ENTREE DANS LA TABLE PERSONNAGE AVEC LES INFORMATION RECUPERER DANS LE FORMULAIRE HTML
## JE VEUX ASSOCIEZ LA VALEUR DU SELCECT A LA COLLUMN type_id dans la table PERSONNAGE

?>
<form method="post">
    <label>nom</label>
    <input name="nom" type="text"><br>
    <label>atk</label>
    <input name="atk" type="text"><br>
    <label>type</label>
    <select name="type" id="type"><br>
        <?php
        foreach($type as $key => $value):
            ;?>
            <option value="<?php echo $value->name?>"><?php echo $value->name?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit">
</form>
<?php
    if (!empty($_POST)) {
    $name = $_POST["nom"];
    $atk = $_POST["atk"];
    $type = $_POST["type"];
    $add_form = $pdo->prepare('INSERT INTO personnages (NAME,ATK,type_id) VALUES ("'.$name.'",'.$atk.', (SELECT ID FROM type WHERE name LIKE "'.$type.'"))'); // PREPARE QUERY
        $add_form->execute();// EXECUTE QUERY
    }







