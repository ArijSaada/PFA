<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", "mondata");
$theme = trim($_POST["theme"]);
$date_deb = trim ($_POST["date_deb"]);




$response = [

    "status" => "",
    "message" => "",
    "data" => [
        "theme"=> "",
        "date_deb" =>""
    ]
];
if ($cnx)
{
     $sql1 = "SELECT * FROM cycle WHERE theme= '$theme' AND date_deb = '$date_deb'";
    $fetch = mysqli_query($cnx, $sql1);
    if ($fetch) {



    if(mysqli_num_rows($fetch) <= 0)
    {
        $response["status"] = "fail";
        $response ["message"] = "cycle inexistant";
        echo json_encode($response);
        exit();
    }
    else {
        $response["status"] = "success";
        
        $response["data"] = [
            "theme"=> $theme,
        "date_deb" =>$date_deb


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
        $response["message"] = "probleme sql recherche du cycle";
        echo(json_encode($response));
        exit();
    

}



}
else {
    $response ["status"] = "fail";
    $response["message"]= "probleme de connexion avec la base de donnees";
    echo json_encode($response);
    exit();
    


}

echo json_encode ($response);
if (empty($response)) {
    $response = json_encode(["message" => "No data found"]);
    echo json_encode ($response);
    exit();
  }

else{
    $response["status"] = "fail";
    $response["message"] = "Probleme de connexion avec la base de donnees";
    echo(json_encode($response));
    exit();

}
echo json_encode($response);






?>
