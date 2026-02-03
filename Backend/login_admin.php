<?php
/*
  $nom     = $_POST["username"] ;
  $passe = $_POST["password"] ;
  $cnx = mysqli_connect( "localhost", "root", "" ,"bf_arabe" ) ;

   $sql = "SELECT *
        FROM admin
        where login='$nom' and pass='$passe'" ;
 
    //exécution de la requête:
    $requete = mysqli_query( $cnx,$sql ) ;

    if(mysqli_fetch_object( $requete ))
    {
    header("Location: menu.php");
    }
    else
    {

      echo("accés refuse");
     /* header("Location: login.php");
    }
 */
header("Access-Control-Allow-Origin: http://localhost:4200"); // Allow requests from your Angular app
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json"); // Ensure the response is JSON

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nom = trim($_POST['mail']);
$passe = trim($_POST['pwd']);
$dbname = 'mondata';

$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);
if (!$cnx) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

mysqli_set_charset($cnx, "utf8");

// Use prepared statements to prevent SQL injection
$stmt = $cnx->prepare("SELECT * FROM admin WHERE login = ? AND pass = ?");
$stmt->bind_param("ss", $nom, $passe);
$stmt->execute();
$requete = $stmt->get_result();

if ($requete->num_rows > 0) {
    echo json_encode(["status" => "success", "message" => "Admin found"]);
} else {
    echo json_encode(["status" => "error", "message" => "Access denied for Username: $nom and Password: $passe"]);
}
$stmt->close();
$cnx->close();

?>