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
$nom_prenom = trim($_POST["nom_formatteur"]);
$specialite = trim($_POST["specialite"]);

$sql1 = "SELECT * FROM formatteur WHERE nom_prenom = '$nom_prenom' AND specialite = '$specialite'";
$result = mysqli_query($cnx, $sql1);
$response = ["status" => "", "message" => ""];

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Format single JSON response
        $response["status"] = "fail";
        $response["message"] = "Le formatteur existe déjà";
    } else {
      $sql2="SELECT * FROM cycle WHERE theme ='$specialite';";
      $fetchcycle = mysqli_query($cnx, $sql2);
      if ($fetchcycle)
      {
        if (mysqli_num_rows($fetchcycle) === 0)
        {
          $response["status"] ="fail";
          $response["message"]= "Specialite ne convient a aucun de nos cycles";
          echo json_encode($response);
          exit();

        }
        else {
          $sql = "INSERT INTO formatteur (nom_prenom, specialite) VALUES ('$nom_prenom', '$specialite')";
          $requete = mysqli_query($cnx, $sql);
  
          if ($requete) {
              $response["status"] = "success";
              $response["message"] = "تمت العملية بنجاح";
          } else {
              $response["status"] = "fail";
              $response["message"] = "failed SQL insert request";
          }
      }
  } else {
    $response["status"] ="fail";
    $response["message"]="erreur sql fetching cycle convenant au formatteur";
  }

        }
      }
      else {
        $response["status"] = "fail";       
        $response["message"] = "failed to check if formatteur exists in the database";
        
      }
       

// Send back a single valid JSON response
echo json_encode($response);
?>
