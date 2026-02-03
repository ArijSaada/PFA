<?php
/*$dbname = 'mondata';
$cnx = mysqli_connect( "localhost", "root", "istic.glsi3" ,$dbname ) ;

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");
// Ensure the response is JSON
if(!$cnx){
    //echo '<script>alert("ech bch ysallakha")</script>';
  }
  else{
    //echo '<script>alert("dabase working")</script>';
    
    $theme = isset($_POST['Theme']) ? trim( $_POST['Theme'] ) : '';
$numSalle = isset($_POST['numSalle']) ? trim ($_POST['numSalle'] ): '';
$date_de_depart = isset($_POST['date_de_depart']) ? trim ($_POST['date_de_depart'] ) : '';
$sql = "select * from participant where 1=1";
if((empty($theme)) && (empty($numSalle)) && (empty($date_de_depart))   )
{
    //echo '<script>alert("Aucun filtre saisi")</script>';  
    echo json_encode(["status" => "success", "message" => "pas de filtre"]);
    $sql = "select * from participant ";
    
   

}
else {
    if(!empty($theme))
    {
        $sql .= " AND theme_part= '" . mysqli_real_escape_string($cnx, $theme) . "'";
        //sql now expects a certain time of the value theme so that if something doesn't much , it doesn'tmess with the databse 
        $parameter[':theme'] = $theme;
       // echo json_encode(["status" => "success", "message" => "theme"]);
    }
    if(!empty($numSalle))
    {
        $sql .= " AND  num_salle  = '" . mysqli_real_escape_string($cnx, $numSalle) . "'";
        //echo json_encode(["status" => "success", "message" => "numSalle"]);
        
        $parameter[':numSalle'] = $numSalle;
    }
    if(!empty($date_de_depart))
    {
          $sql .= " AND date_de_depart = '" . mysqli_real_escape_string($cnx, $date_de_depart) . "'";
        //echo json_encode(["status" => "success", "message" => "date_de_depart"]);
        
        //$parameter[':date_de_depart'] = $date_de_depart;
    }
    }
    $result = mysqli_query($cnx, $sql);
    if(!$result)
    {
       // echo'<script>alert("no result found")</script>';
    }
    else {
$participants = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode(['status' => 'success', 'data' => $participants]);
    }    
}

  
 
$dbname = 'mondata';
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

if (!$cnx) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit();
}

$theme = isset($_POST['Theme']) ? trim($_POST['Theme']) : '';
$numSalle = isset($_POST['numSalle']) ? trim($_POST['numSalle']) : '';
$date_de_depart = isset($_POST['date_de_depart']) ? trim($_POST['date_de_depart']) : '';

$response = [
    "status" => "success",
    "message" => "",
    "data" => []
];

$sql = "SELECT * FROM participant WHERE 1=1";

if (empty($theme) && empty($numSalle) && empty($date_de_depart)) {
    $response['message'] = "pas de filtre"; // Set the message for no filter
} else {
    if (!empty($theme)) {
        $sql .= " AND theme_part = '" . mysqli_real_escape_string($cnx, $theme) . "'";
    }
    if (!empty($numSalle)) {
        $sql .= " AND num_salle = '" . mysqli_real_escape_string($cnx, $numSalle) . "'";
    }
    if (!empty($date_de_depart)) {
        $sql .= " AND date_de_depart = '" . mysqli_real_escape_string($cnx, $date_de_depart) . "'";
    }
}

$result = mysqli_query($cnx, $sql);
if ($result) {
    $participants = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $response['data'] = $participants; // Populate data
} else {
    $response['status'] = "error";
    $response['message'] = "Query failed";
}

echo json_encode($response); // Always return a single JSON object
?>
*/

// Database connection details
$dbname = 'mondata';
$cnx = mysqli_connect("localhost", "root", "istic.glsi3", $dbname);

// CORS headers for allowing the frontend to communicate
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Check if connection was successful
if (!$cnx) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit();
}

// Get POST data
$theme = isset($_POST['Theme']) ? trim($_POST['Theme']) : '';
$numSalle = isset($_POST['numSalle']) ? trim($_POST['numSalle']) : '';
$date_de_depart = isset($_POST['date_de_depart']) ? trim($_POST['date_de_depart']) : '';

// Default response structure
$response = [
    "status" => "success",
    "message" => "",
    "data" => []
];

// Build the SQL query
$sql = "SELECT * FROM participant WHERE 1=1";

if (empty($theme) && empty($numSalle) && empty($date_de_depart)) {
    $response['message'] = "pas de filtre"; // No filters applied
} else {
    if (!empty($theme)) {
        $sql .= " AND theme_part = '" . mysqli_real_escape_string($cnx, $theme) . "'";
    }
    if (!empty($numSalle)) {
        $sql .= " AND num_salle = '" . mysqli_real_escape_string($cnx, $numSalle) . "'";
    }
    if (!empty($date_de_depart)) {
        $sql .= " AND date_de_depart = '" . mysqli_real_escape_string($cnx, $date_de_depart) . "'";
    }
}

// Execute the query
$result = mysqli_query($cnx, $sql);

if ($result) {
    $participants = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $response['data'] = $participants; // Add participants to the response
    if (empty($participants)) {
        $response['message'] = "No participants found";
    }
} else {
    $response['status'] = "error";
    $response['message'] = "Query failed: " . mysqli_error($cnx);
}

// Return the response as JSON
echo json_encode($response);


?>