<?php
require_once '../inc/init.inc.php';
require_once '../inc/admin/adminHeader.inc.php';
//Variable d'affichage :
$bo_xp ="";
$errorXp ="";
$xp ="";
$successXp="";
/*>>>>> GESTION ADMIN EXPERIENCE >>>>>*/
/*
*SUPPRESSION DES EXPERIENCES
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
$req= executeRequete("DELETE FROM xp WHERE idxp = :idxp", array(
':idxp' => $_GET['id']
));
if($req->rowCount()== 1){
$errorXp .= '<div class="alert alert-success>L\'expérience n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{
        $errorXp .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
}
}
/*
*AFFICHAGE DES EXPERIENCES
*/
// Variable d'affichage :
//if(isset($_GET['gestion']) && $_GET['gestion'] =='experience'){
$req = $pdo->query("SELECT * FROM xp ORDER BY xpyear2 DESC");
while($xps = $req->fetch(PDO::FETCH_ASSOC)){
$bo_xp .= '<tr>';
    if($xps['xpyear1'] == $xps['xpyear2']){
    $bo_xp .= '<th>Depuis </th>';
    } else{
    $bo_xp .= '<th>'.$xps['xpyear1'].'</th>';
    }
    $bo_xp .= '<th>'.$xps['xpyear2'].'</th>';
    $bo_xp .= '<td>'.$xps['xpfunction'].'</td>';
    $bo_xp .= '<td>'.$xps['xpemployer'].'</td>';
    $bo_xp .= '<td>'.$xps['xpresume'].'</td>';
    $bo_xp .='<td><a href="../form/formXp.php?action=update&id='.$xps['idxp'].'"><i class="far fa-edit text-warning"></i></a></td>';
    $bo_xp .='<td><a href="?gestion=experience&action=supp&id='.$xps['idxp'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
    $bo_xp .= '</tr>';
}
//}
/*
*AJOUT & MODIFICATION DES EXPERIENCES
*/
$select_date = '';
$year = date('Y');
$century = $year - 100;
$select_date2 = '';
$year2 = date('Y');
$century2 = $year - 100;
// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
$req = $pdo->prepare("SELECT * FROM xp WHERE idxp = :idxp");
$req->bindParam(':idxp', $_GET['id']);
$req->execute();
//    if($req->rowCount()> 0){
//Je récupère des infos en BDD pour afficher dans le formulaire de modification
$xp_update = $req->fetch(PDO::FETCH_ASSOC);
//    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
// /!\ A REVOIR !!!!!!!!!!
while($year >= $century){
if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id']) && $_GET['id'] == $xp_update['idxp'] && $xp_update['xpyear1'] ==
$year && isset($_GET['id']) && $_GET['id'] == $xp_update['idxp'] && $xp_update['xpyear2'] == $year2){
$select_date .= '<option selected>' . $year . '</option>';
$select_date2 .= '<option selected>' . $year2 . '</option>';
}
elseif ($_POST && isset($_POST['xpyear1']) && $_POST['xpyear1'] == $year && isset($_POST['xpyear2']) && $_POST['xpyear2'] = $year2 ) {
$select_date .= '<option selected>' . $year . '</option>';
$select_date2 .= '<option selected>' . $year2 . '</option>';
} else {
$select_date .= '<option>' . $year . '</option>';
$select_date2 .= '<option>' . $year2 . '</option>';
}
$year--;
$year2--;
}
//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
//Vérification des champs
if(!isset($_POST['xpyear1']) || !is_numeric($_POST['xpyear1']) || $_POST['xpyear1'] > date('Y') || $_POST['xpyear1'] < $century){
$errorXp .= '<div class="alert alert-warning text-danger">** Sélectionnez une première date</div>';
}
if(!isset($_POST['xpyear2']) || !is_numeric($_POST['xpyear2']) || $_POST['xpyear2'] > date('Y') || $_POST['xpyear2'] < $century){
$errorXp .= '<div class="alert alert-warning text-danger">** Sélectionnez une seconde date</div>';
}
if(!isset($_POST['xpfunction']) || strlen($_POST['xpfunction']) < 3 || strlen($_POST['xpfunction']) > 100){
$errorXp .= '<div class="alert alert-warning text-danger">** Indiquez le poste occupé </div>';
}
if(!isset($_POST['xpemployer']) || strlen($_POST['xpemployer']) < 3 || strlen($_POST['xpemployer']) > 100){
$errorXp .= '<div class="alert alert-warning text-danger">** Indiquez le nom de l\'employeur </div>';
}
if(!isset($_POST['xpresume']) || strlen($_POST['xpresume']) < 3 || strlen($_POST['xpresume']) > 100){
$errorXp .= '<div class="alert alert-warning text-danger">** Faite un descriptif de vos fonctions </div>';
}
//1.3 - Insertion en BDD si tout les champs sont correctes
if(empty($errorXp)){
// a) assainissement des saisies de l'intertnaute
foreach($_POST as $indice => $valeur){
$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
}
//b) enregistrement en BDD
$donnees = $pdo->prepare("REPLACE INTO xp VALUES (:idxp, :xpyear1, :xpyear2, :xpfunction, :xpemployer, :xpresume)", array(
':idxp' => $_POST['idxp'],
':xpyear1' => $_POST['xpyear1'],
':xpyear2' => $_POST['xpyear2'],
':xpfunction' => $_POST['xpfunction'],
':xpemployer' => $_POST['xpemployer'],
':xpresume' => $_POST['xpresume']
)
);
$donnees->bindparam(':idxp', $_POST['idxp']);
$donnees->bindParam(':xpyear1', $_POST['xpyear1']);
$donnees->bindParam(':xpyear2', $_POST['xpyear2']);
$donnees->bindParam(':xpfunction',$_POST['xpfunction']);
$donnees->bindParam(':xpemployer', $_POST['xpemployer']);
$donnees->bindParam(':xpresume', $_POST['xpresume']);
$donnees->execute();
$successXp .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
}// if(empty($msg)){
} //FIN if(POST)
?>

<h3>Gestion des experiences :</h3>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="container">
            <table class="table table-striped table-dark" border="1px solid red">
                <thead>
                <tr>
                    <th colspan="2">Années</th>
                    <th>Fonction</th>
                    <th>Employeur</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                echo $bo_xp;
                ?>
                </tbody>
            </table>
            <a href="../form/formXp.php" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
        </div>
    </div>
</div>