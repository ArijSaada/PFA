<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

// Get the POST data


$nom_formatteur = trim($_POST['nom_formatteur']);  // The original name
$nom_prenom_new = trim($_POST['nom_formatteur_update']);  // The new name
$specialite = trim($_POST['specialite']);
$specialite_new = trim($_POST['specialite_new']);

$dbname = 'mondata';
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);

$response = [
    "status" => "",
    "message" => ""
];

if ($cnx) {
    $sql = "UPDATE formatteur SET nom_prenom='$nom_prenom_new', specialite='$specialite_new' WHERE nom_prenom='$nom_formatteur' AND specialite='$specialite'";
   // $sql = "UPDATE formatteur SET nom_prenom='$nom_prenom_new'AND  specialite='$specialite_new' WHERE( nom_prenom='$nom_formatteur' AND specialite='$specialite');";
    $result = mysqli_query($cnx, $sql);
    
    if ($result) {
        $response["status"] = "success";
        $response["message"] = "Formatteur mis à jour avec succès.";
        echo json_encode($response);
        exit();
    } else {
        $response["status"] = "fail";
        $response["message"] = "Échec de la mise à jour du formatteur.";
        echo json_encode($response);
        exit();
    }
} else {
    $response["status"] = "fail";
    $response["message"] = "Erreur de connexion à la base de données.";
    echo json_encode($response);
        exit();
}

// Send response as JSON
echo json_encode($response);
?>
