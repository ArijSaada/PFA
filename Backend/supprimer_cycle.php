<?php /* 
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

  $cnx = mysqli_connect( "localhost", "root", "istic.glsi3","mondata") ;
  $nom_prenom     =  trim($_POST["nom_formatteur"]);
  $specialite     =  trim($_POST["specialite"]) ;
  /*$direction     =  $_POST["direction"] ;
  $entreprise     = $_POST["entreprise"] ;
  
  $sql1 ="select * from formatteur where (nom_prenom = '$nom_prenom ' and specialite  = '$specialite')";
  $result = mysqli_query($cnx,$sql1 );
  $response = [
    "status" => "success",
    "message" => ""
  ];
  if($result)
  {
    if (mysqli_num_rows($result) > 0)
    {
      echo json_encode(["status" => "fail", "message" =>"Le formatteur existe deja"]);
        /*$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data); 
    
    //echo mysqli_num_rows($result);
    exit();
    }
    else {
      echo json_encode(["status" => "loading ....", "message" =>"Ajout  du formatteur  en cours ..."]);
      $response["status"] = "loading ....";
      $response["message"] = "Ajout  du formatteur  en cours ...";



  

  $sql = "INSERT  INTO formatteur (nom_prenom,specialite)
            VALUES ( '$nom_prenom', '$specialite') " ;
 
 
  $requete = mysqli_query($cnx,$sql ) or die( mysqli_error() ) ;
 

  if($requete)
  {
    $response["message"] ="تمت العملية بنجاح ";
    $response["status"] = "success";
  }
  else
  {
    $response["status"] = "fail";
    $response["message"] = "failed sql insert request";
  }
}
  }
  else {
    $response["status"] = "fail";
    $response["message"] = "failed to see if formatteur exist in the database";

  }
  echo json_encode($response);
  */



header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$cnx = mysqli_connect("localhost", "root", "istic.glsi3", "mondata");
$theme = trim($_POST["theme"]);
$date_deb = trim ($_POST["date_deb"]);


$sql1 = "SELECT * FROM cycle WHERE theme= '$theme' AND date_deb = '$date_deb'";
$result = mysqli_query($cnx, $sql1);
$response = ["status" => "", "message" => ""];

if ($result) {
    
      if (mysqli_num_rows($result) <= 0) {
       $response["status"] = "fail";
       $response["message"] = "can't delete something that doesn't exist, dummy !";
       echo json_encode($response);
       exit();
    }
    if (mysqli_num_rows($result) > 0) {
        // Format single JSON response
        $response["status"] = "success";
        $response["message"] = "Let s start deleting ";
        $sql = "delete from cycle where ( theme= '$theme' AND date_deb = '$date_deb');";
        $requete = mysqli_query($cnx,$sql);

        if ($requete) {
            $response["status"] = "success";
            $response["message"] = "تمت العملية بنجاح";
            $response["message"] = "supprimé";

        } else {
            $response["status"] = "fail";
            $response["message"] = "failed SQL insert request";
            echo json_encode($response);
            exit();
        }
    }
} else {
    $response["status"] = "fail";
    $response["message"] = "failed to check if cycle exists in the database";
}

// Send back a single valid JSON response
echo json_encode($response);
?>
