<?php
//require __DIR__ . "/vendor/autoload.php";

## ETAPE 0

## CONNECTEZ VOUS A VOTRE BASE DE DONNEE

try{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=test', "root", "");
} catch (Exception $e){
    echo "erreur de connection à la base de donnée";
}

### ETAPE 1


####CREE UNE BASE DE DONNEE AVEC UNE TABLE PERSONNAGE, UNE TABLE TYPE
/*
 * personnages
 * id : primary_key int (11)
 * name : varchar (255)
 * atk : int (11)
 * pv: int (11)
 * type_id : int (11)
 * stars : int (11)
 */

/*
 * types
 * id : primary_key int (11)
 * name : varchar (255)
 */
//fait avec phpmyadmin

#######################
## ETAPE 2

#### CREE DEUX LIGNE DANS LA TABLE types
# une ligne avec comme name = feu
# une ligne avec comme name = eau
//fait avec phpmyadmin

#######################
## ETAPE 3

# AFFICHER DANS LE SELECTEUR (<select name="" id="">) tout les types qui sont disponible (cad tout les type contenu dans la table types)
// ajouter le php plus bas

#######################
## ETAPE 4

# ENREGISTRER EN BASE DE DONNEE LE PERSONNAGE, AVEC LE BON TYPE ASSOCIER


#######################
## ETAPE 5
# AFFICHER LE MSG "PERSONNAGE ($name) CREER"
//echo "Personnage créer";

#######################
## ETAPE 6

# ENREGISTRER 5 / 6 PERSONNAGE DIFFERENT

?>

<?php
$show_type = $pdo->prepare('SELECT * FROM types');
$show_type->execute();
$type = $show_type->fetchAll(PDO::FETCH_OBJ);
?>
<?php
$add_perso = $pdo->prepare('INSERT INTO personnages *');
$add_perso->execute();
$perso = $add_perso->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rendu Php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="nav mb-3">
    <a href="./rendu.php" class="nav-link">Accueil</a>
    <a href="./personnage.php" class="nav-link">Mes Personnages</a>
    <a href="./combat.php" class="nav-link">Combats</a>
</nav>
<h1>Accueil</h1>
<div class="w-100 mt-5">
    <form action="" method="POST" class="form-group">
        <div class="form-group col-md-4">
            <label for="">Nom du personnage</label>
            <input type="text" class="form-control" placeholder="Nom">
        </div>

        <div class="form-group col-md-4">

            <label for="">Attaque du personnage</label>
            <input type="text" class="form-control" placeholder="Atk">
        </div>

        <div class="form-group col-md-4">
            <label for="">Point de vie du personnage</label>
            <input type="text" class="form-control" placeholder="Pv">
        </div>

        <div class="form-group col-md-4">
            <label for="">Type</label>
            <select name="" id="">
                <option value="" selected disabled>Choissisez un type</option>
                <?php
                foreach($type as $key => $value):
                    ;?>
                    <option value="<?php echo $value->name?>"><?php echo $value->name?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="">Etoiles du Personnage</label>
            <input type="text" class="form-control" placeholder="Nbr">
        </div>
        <button class="btn btn-primary">Enregistrer</button>

    </form>
    <?php
    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
        $atk = $_POST["atk"];
        $pv = $_POST["pv"];
        $type_id = $_POST["type"];
        $stars = $_POST["étoiles"];
        $add_form = $pdo->prepare('INSERT INTO personnages (NAME,atk,pv,type_id,stars) VALUES ("' . $name . '","' . $atk . '","' . $pv . '","' . $type_id . '","' . $stars . '")');
        $add_form->execute(["name" => $name, "atk" => $atk, "pv" => $pv, "type_id" => $type_id,"stars" => $stars ]);
    }
    $show_stat = $pdo->prepare('SELECT * FROM personnages');
    $show_stat->execute();
    $status = $show_stat->fetchAll(PDO::FETCH_OBJ);
    ?>
</div>

</body>
</html>
