<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

$cnx = mysqli_connect("localhost", "root", "istic.glsi3", "mondata");
$response = ["status" => "", "message" => ""];
if (!$cnx) {
    $response["status"] ="Connection failed: ";
    $response["message"] = mysqli_connect_error();
    echo json_encode($response);
    exit();
}
else {
    





$theme = trim($_POST["theme"]);
$date_deb = trim ($_POST["date_deb"]);
$date_fin = trim($_POST["date_fin"]);
$form = trim($_POST["form"]);


$num_salle = (int)trim($_POST["num_salle"]);
$sql1 = "SELECT * from cycle where ( theme = '$theme' and date_deb = '$date_deb' AND  form = '$form' );";
$result = mysqli_query($cnx, $sql1);
if($result)
{ if(mysqli_num_rows($result) > 0)
    { $response["status"] = "success";
        $response["message"] = "Le cycle existe deja";
        echo json_encode($response);
        /*$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data); 
    echo mysqli_num_rows($result);
    */
    exit();

    }
    else{
        
        $sql2 = "select * from formatteur where nom_prenom = '$form'";
$resultform = mysqli_query($cnx,$sql2);
if(!$resultform)
{
    //echo " no formatteur fetch prb sql2";
    exit();
}

if ($resultform)
{
    if (mysqli_num_rows($resultform) > 0 )
    { $response["status"] = "fail" ;
        $response["message"] = "Ce formatteur s occupe déjà d'un cycle";

        echo json_encode($response);
        exit();
        
    }


    
    
else {
    $checkDate = $date_deb;
    $sql4 = "select * from cycle where ( (date_deb <='$checkDate' AND date_fin >='$checkDate' ) And num_salle ='$num_salle');";
    $resultSalle = mysqli_query($cnx,$sql4);
    if ($resultSalle)
    {
        if (mysqli_num_rows($resultSalle) > 0)
        {$response["status"] = "fail";
            $response["message"] = "Salle occupee.";
            echo json_encode($response); 
            exit();
        }
        else {
            $response["status"] = "loading ....";
            $response["message"] = "Ajout  du cycle  en cours ...";
            //echo json_encode($response);
            



$sql = "INSERT INTO cycle ( theme, date_deb, date_fin, form, num_salle)
        VALUES ( '$theme', '$date_deb', '$date_fin', '$form', '$num_salle');";

if (mysqli_query($cnx, $sql)) {
    //echo json_encode(["status" => "success", "message" => "تمت العملية بنجاح"]);
    $sql3 = "INSERT  INTO formatteur (nom_prenom,specialite)
            VALUES ( '$form', '$theme') " ;
    $resulAddForm = mysqli_query($cnx,$sql3);
    if($resulAddForm)
    { $response["status"] = "success";
        $response["message"] = "تمت العملية بنجاح";
        //echo json_encode($response);

    }
    else {
        $response["status"] = "fail";
        $response ["message"] = "L'insertion du cycle  a réussie, mais celle du formatteur a échoué ";
        echo json_encode($response);
        exit();

    }
} else {
    $response["status"] = "fail";
    $response ["message"] = "L'insertion du cycle échoué ";
    echo json_encode($response);
    exit();
}
}
/*$sql2 = "select * from formatteur where nom_prenom = '$form'";
$resultform = mysqli_query($cnx,$sql2);
if ($resultform)
{
    if ($mysqli_num_rows($resultform) > 0 )
    {
        echo json_encode(["status" => "fail", "message" => "Ce formatteur s occupe déjà d'un cycle"]);
        exit();
        
    }

}
    */

}

}
}
}
}
}


echo json_encode($response);
mysqli_close($cnx);
?>
