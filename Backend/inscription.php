<?php
$dbname = 'mondata';
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);

// CORS headers for allowing the frontend to communicate
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
$response = [
  "status" => "success",
  "message" => "",
  
];

// Check if connection was successful
if (!$cnx) {
    //echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    $response["message"] = 'failed Database connection ';
    $response["status"] = 'fail';
    exit;
    
   
}
else {
  $name = trim($_POST['name']);
/*$passe = trim($_POST['pwd']);
$passe = password_hash($passe, PASSWORD_BCRYPT);
*/
$passe = trim($_POST['pwd']);
//$passe = password_hash($passe, PASSWORD_BCRYPT);
$theme = trim($_POST['theme']);
$mail = trim($_POST['mail']);
$date_debut1 = trim($_POST['date_debut']);
$date_debut2 = new DateTime($date_debut1);
$date_debut = $date_debut2->format('Y-m-d');

//echo "\nvous avez envoyé les parametres suivants :";

//echo "\n name :".$name;
//echo "\n pwd :".$passe;
//echo "\n theme :".$theme;
//echo "\n date_debut:".$date_debut;

  $response["message"] = 'successful Database connection'  ;
  $sql1 = "select * from participant where (mail = '$mail' AND theme_part ='$theme')  ;";
  $checkUser = mysqli_query($cnx, $sql1);

  

  if(mysqli_num_rows($checkUser) > 0 )
  {
    $response["message"] = 'user already exists';
    $response["status"] = 'fail';
    //exit;
  }
  else {
    $sqlSalle = "SELECT num_salle  from cycle where (theme = '$theme') LIMIT 1";
    
    $checkSalle = mysqli_query($cnx, $sqlSalle);
    $sqlDate = "SELECT date_deb  from cycle where (theme = '$theme') LIMIT 1";
    $checkDate =  mysqli_query($cnx, $sqlDate);
    
    
    
    


    
    
    //$sql2 = "insert into participant ( nom_prenom, mail, pass,theme_part) VALUES ('$name','$mail','$passe','$theme')";
    //$sql2 = "select * from participant where (mail = '$mail' AND theme_part ='$theme')  ;";
    
    

    if(mysqli_num_rows($checkSalle) > 0 )
  {
    if(mysqli_num_rows($checkDate) > 0)
    {
      $rowDate = mysqli_fetch_assoc($checkDate);
      $rowDateCheck = $rowDate['date_deb'];
      //echo "\n date mte3i hya .$rowDateCheck";
      if ($date_debut == $rowDate['date_deb'])
      {
        $rowSalle = mysqli_fetch_assoc($checkSalle);
        $numSalle = $rowSalle['num_salle'];
        //$sql2 = "INSERT INTO participant (nom_prenom, mail, pass, theme_part, num_salle, date_debut ) VALUES ('$name', '$mail', '$passe', '$theme','$numSalle',$date_debut )";
        $sql2 = "INSERT INTO participant (nom_prenom, mail, pass, theme_part, num_salle, date_debut) VALUES ('$name', '$mail', '$passe', '$theme', '$numSalle', '$date_debut')";
        $INSERTION= mysqli_query($cnx, $sql2);
        if ($INSERTION)
        {

        if(mysqli_num_rows($checkSalle) > 0 )
        {
          $sqlAlter = "UPDATE participant SET num_salle = '$numSalle' WHERE mail = '$mail' AND theme_part = '$theme'";
    
          $checkAlter = mysqli_query($cnx, $sqlAlter );
    
        }
        else {
          $response["message"] ="Pas de salle";
          $response["status"] = "fail";
          //exit;
    
        }
      }
      else {
        $response["message"] = 'failing to find cycle wanted ';
        $response["status"] = 'fail';
    
      }
        
    
    
      }


      }
      else {
        $response["message"] = 'Désolé, il nexiste aucune formation ayant la date début et le thème saisis .';
        $response["status"] = 'fail';
        //exit;
      }
      $response["message"] = 'user_added';
        $response["status"] = 'success';


    }
  }
   /* $response["message"] = 'user added';
    $response["status"] = 'success';
    */
   
  echo json_encode ($response);

}



?>