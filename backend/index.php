<?php
//get database config details
require('dbconn.php');

//set CORS headers
header("Access_Control-Allow-Origin:*");
header("Access_Control-Allow-Credentials: true");
header("Access_Control-Allow-Headers: access");
header("Access_Control-Max_Age: 2000");
header("Access_Control-Allow-Methods:POST, GET");
header("Access_Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//create connection 
$conn=mysqli_connect($hostname,$hostusername,$hostpassword,$databasename);

if(!$conn){
    echo json_encode(['error'=> 'Could Not Connect to Server']);
    exit;
}

echo 'Welcome Diaz Sifontes';
?>