<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

$theme = trim($_POST['theme']);
$new_theme = trim($_POST['new_theme']);
$date_deb = trim ($_POST['date_deb']);
$date_deb_new = trim($_POST['date_deb_new']);
$date_fin = trim ($_POST['date_fin']);


$form= trim($_POST['nom_formatteur']);  
$numSalle = trim($_POST['num_salle']);  

$dbname = 'mondata';
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);

$response = [
    "status" => "",
    "message" => ""
];

if ($cnx) {
    
    $sql = "UPDATE cycle SET date_deb='$date_deb_new', theme='$new_theme', form = '$form' , date_fin ='$date_fin' , num_salle ='$numSalle'  WHERE( theme='$theme' AND date_deb='$date_deb');";
    $result = mysqli_query($cnx, $sql);
    
    if ($result) {
        $response["status"] = "success";
        $response["message"] = "Cycle mis à jour avec succès.";
        echo json_encode($response);
        exit();
    } 
    else {
        $response["status"] = "fail";
        $response["message"] = "Échec de la mise à jour du cycle.";
        echo json_encode($response);
        exit();
    }
}
 else {
    $response["status"] = "fail";
    $response["message"] = "Erreur de connexion à la base de données.";
    echo json_encode($response);
        exit();
}


echo json_encode($response);
$cnx->close();
?>
