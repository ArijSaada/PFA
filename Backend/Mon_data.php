<?php
$host = '127.0.0.1';          
$username = 'root';           
$password = 'istic.glsi3';               
$dbname = 'mondata';  

$connexion = new mysqli($host,$username,$password,$dbname);
if (!$connexion)
{echo "<script>alert('ech bch yfodhoha bin ll php wil database ') </script>";
    
}
else { echo "<script> alert ('Finally database connection DONE successfully ') </script>";}

?>
