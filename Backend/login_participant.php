<?php
/*

header("Access-Control-Allow-Origin: http://localhost:4200"); // Make sure this matches the URL of your Angular app
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
  /*$nom     = $_POST["username"] ;
  $passe = $_POST["password"] ;
  $cnx = mysqli_connect( "localhost", "root", "istic.glsi3" ,"mondata" ) ;
  if(!$cnx){
    console.log("ech bch ysallakha");
  }

   $sql = "SELECT *
        FROM participant
        where mail='$nom' and pass='$passe'" ;
 
    //exécution de la requête:
    $requete = mysqli_query( $cnx,$sql ) ;

    if(mysqli_fetch_object( $requete ))
    {
    header("Location: menu.php");
    }
    else
    {
      if (!$requete) {
        echo "Error executing query: " . mysqli_error($cnx);
    }
    else {
    

      echo("accès refusé"); 
echo "username : " . $nom; 
echo "password : " . $passe;

     /* header("Location: login.php");
    }
  }
 */
/*$nom= trim($_POST['username']) ;
  $passe = trim( $_POST['password'] );
  $dbname = 'mondata';
  $cnx = mysqli_connect( "localhost", "root", "istic.glsi3" ,$dbname ) ;
  if(!$cnx)
  {die("prb de connxion avec sql");}
  if($cnx)
  {
    echo("connection to " . $dbname . " succeeded");


    $stmt = $cnx->prepare("SELECT * FROM participant WHERE mail = ? AND pass = ?");
    $stmt->bind_param("ss", $nom, $passe);
    $stmt->execute();
    $requete = $stmt->get_result();
    
    if ($requete->num_rows > 0) {
        header("Location: menu.php");
    } else {
        echo "Access denied for Username: $nom and Password: $passe";
    }
    $stmt->close();
    $cnx->close();
     /* header("Location: login.php");
    }
  


error_reporting(E_ALL);
ini_set('display_errors', 1);

$nom = trim($_POST['username']);
$passe = trim($_POST['password']);
$dbname = 'mondata';
echo "Received Username: $nom, Password: $passe\n";

$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);
if (!$cnx) {
    die("Connection failed: " . mysqli_connect_error());
}
echo json_encode(['database' => $dbname]);

mysqli_set_charset($cnx, "utf8");

// Use prepared statements to prevent SQL injection
$stmt = $cnx->prepare("SELECT * FROM participant WHERE mail = ? AND pass = ?");
$stmt->bind_param("ss", $nom, $passe);
$stmt->execute();
$requete = $stmt->get_result();

if ($requete->num_rows > 0) {
  echo "user found";
   // header("Location: menu.php");
} else {
    echo "Access denied for Username: $nom and Password: $passe";
}
$stmt->close();
$cnx->close();
?>
*/ 
/*

header("Access-Control-Allow-Origin: http://localhost:4200"); // Allow requests from your Angular app
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json"); // Ensure the response is JSON

error_reporting(E_ALL);
ini_set('display_errors', 1);


$mail = trim($_POST['mail']);

$passe = trim($_POST['password']);
$dbname = 'mondata';

$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);
if (!$cnx) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

mysqli_set_charset($cnx, "utf8");

// Use prepared statements to prevent SQL injection
$stmt = $cnx->prepare("SELECT * FROM participant WHERE mail = ? AND pass = ? ");
$stmt->bind_param("ss", $passe, $mail);
$stmt->execute();
$requete = $stmt->get_result();

if ($requete->num_rows > 0) {
    echo json_encode(["status" => "success", "message" => "User found"]);
} else {
    echo json_encode(["status" => "error", "message" => "Access denied for mail: $nom and Password: $passe"]);
}
$stmt->close();
$cnx->close();
*/

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
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mail = trim($_POST['mail']);
$passe = trim($_POST['pwd']);
$dbname = 'mondata';

$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);
if (!$cnx) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

mysqli_set_charset($cnx, "utf8");

// Use prepared statements to prevent SQL injection
$stmt = $cnx->prepare("SELECT * FROM participant WHERE mail = ? AND pass = ?");
$stmt->bind_param("ss", $mail, $passe);
$stmt->execute();
$requete = $stmt->get_result();

if ($requete->num_rows > 0) {
    echo json_encode(["status" => "success", "message" => "user found"]);
} else {
    echo json_encode(["status" => "error", "message" => "Access denied for mail: $mail and Password: $passe"]);
}
$stmt->close();
$cnx->close();

?>

