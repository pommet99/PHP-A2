<?php
require __DIR__."/vendor/autoload.php";
## DANS SE FICHIER JE VOUDRAIS
# UN FORMULAIRE HTML QUI ME PERMET DE CREE UN PERSONNAGE EN CHOISSANT SON TYPE
try{
    $pdo = new PDO('mysql:host=3306;dbname=exophp1', "root", "");
} catch (Exception $e){
    echo "erreur de connection à la base de donnée";
}

$show_type = $pdo->prepare('SELECT * FROM type');
$show_type->execute();
$type = $show_type->fetchAll(PDO::FETCH_OBJ);

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
if (!empty($_POST["nom"])) {
    $name = $_POST["nom"];
    $atk = $_POST["atk"];
    $type = $_POST["type"];
    $add_form = $pdo->prepare('INSERT INTO personnages (NAME,ATK,type_id) VALUES ("' . $name . '",' . $atk . ', (SELECT ID FROM type WHERE name LIKE "' . $type . '"))'); // PREPARE QUERY
    $add_form->execute();// EXECUTE QUERY
}
# UN FORMULAIRE AVEC
# - UN SELECTEUR QUI ME PERMET DE SELECTIONER UN PERSONNAGE DISPONIBLE DANS LA BASE DE DONNEE
# - UN SELECTEUR QUI ME PERMET DE SELECTIONER UN AUTRE PERSONNAGE DISPONIBLE DANS LA BASE DE DONNEE
# UN BOUTON FIGHT
$show_stat = $pdo->prepare('SELECT * FROM personnages');
$show_stat->execute();
$status = $show_stat->fetchAll(PDO::FETCH_OBJ);
?>
<form method="post">
    <select name="pers1" id="pers1"><br>
        <?php
        foreach($status as $key => $value):
            ;?>
            <option value="<?php echo $value->ID?>"><?php echo $value->NAME?></option>
        <?php endforeach; ?>
    </select>
    <select name="pers2" id="pers2"><br>
        <?php
        foreach($status as $key => $value):
            ;?>
            <option value="<?php echo $value->ID?>"><?php echo $value->NAME?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="FIGHT">
</form>

<?php
if (!empty($_POST["pers1"])) {
$perso1=$_POST["pers1"];
$perso2=$_POST["pers2"];
$show_stat1 = $pdo->prepare('SELECT * FROM `personnages` WHERE ID IN("'.$perso1.'","'.$perso2.'")');
$show_stat1->execute();
$status1= $show_stat1->fetchAll(PDO::FETCH_OBJ);
$atkp1=$status1[0]->ATK;
$atkp2=$status1[1]->ATK;
$lifep1=$status1[0]->PV;
$lifep2=$status1[1]->PV;
while( $lifep1>0 && $lifep2>0 ){
    $lifep1=$lifep1-$atkp2;
    echo "1ER PERSONNAGE A PERDU ".$atkp2."/".$lifep1."<br>";
    $lifep2=$lifep2-$atkp1;
    echo "2EME PERSONNAGE A PERDU ".$atkp1."/".$lifep2."<br>";
}
if($lifep1>0 && $lifep2<=0){
    echo "Le personnage 2 est mort sous la force du personnage 1<br>";
}
elseif($lifep2>0 && $lifep1<=0){
    echo "Le personnage 1 est mort sous la force du personnage 2<br>";
}
elseif($lifep2<=0 && $lifep1<=0){
    echo "Le personnage 1 et 2 sont mort<br>";
}}
# LORSQUE L'ON CLIQUE SUR LE BOUTON FIGHT, ON ENVOIE UN FORMULAIRE POST

# DANS SE FORMULAIRE POST JE VEUX QUE VOUS RECUPERIEZ LES DEUX PERSONNAGE CHOISIS DANS LES SELECTEUR HTML
# RECUPERER L'ATK DES PERSONNAGES, SOUSTRAIRE L'ATK DU PERSONNAGE AU PV DE LAUTRE PERSONNAGE (et vice versa)
# ENSUITE AFFICHER
#  - 1ER PERSONNAGE A PERDU TANT DE PV / PV ACTUEL :
#  - 2EME PERSONNAGE A PERDU TANT DE PV / PV ACTUEL :