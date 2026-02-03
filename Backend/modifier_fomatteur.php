<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
$nom_prenom = trim($_POST["nom_formatteur"]);

$specialite = trim($_POST["specialite"]);

$dbname = 'mondata';
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);
$response = [

    "status" => "",
    "message" => "",
    "data" => [
        "nom_prenom"=> "",
        "specialite" =>""
    ]
];
if ($cnx)
{
$sql = "select * from formatteur where (nom_prenom ='$nom_prenom' AND  specialite  = '$specialite');";
$fetch = mysqli_query($cnx,$sql);
if($fetch)
{
    if(mysqli_num_rows($fetch) <= 0)
    {
        $response["status"] = "fail";
        $response ["message"] = "formatteur inexistant";
        echo json_encode($response);
        exit();
    }
    else {
        $response["status"] = "success";
        
        $response["data"] = [
            "nom_prenom"=> $nom_prenom,
        "specialite" =>$specialite


        ];
        $response["message"] = "Bravo ! Acquisition des donnees du formatteur a modifier reussie !";
        echo json_encode($response);
        exit();
        
        // now i need to  make my angular go by this.router.navigate (['modif_formatteur'])
        // BUT the issue is  i need to send these values to that router 
        // so that in the next page , the admin saisi les modifications qu'il souhaite a CE formatteur et en cliquant valider, CE FORMATTEUR se modifie 
 


    }
    

    }
    else { 
        $response["status"] = "fail";
        $response["message"] = "formatteur non trouve";
        echo(json_encode($response));
        exit();
    

}



}
else {
    $response["status"] = "fail";
    $response["message"] = "Probleme de connexion avec la base de donnees";
    echo(json_encode($response));
    exit();


}

echo json_encode ($response);
if (empty($response)) {
    $response = json_encode(["message" => "No data found"]);
    echo json_encode ($response);
    exit();
  }
  
  





?>
