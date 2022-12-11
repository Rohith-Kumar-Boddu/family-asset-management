<?php
//get database config details
require('dbconn.php');

//set CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Max_Age: 1000");
header("Access-Control-Allow-Methods:POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//create connection 
$conn=mysqli_connect($hostname,$hostusername,$hostpassword,$databasename);

if(!$conn){
    echo json_encode(['error'=> 'Could Not Connect to Server']);
    exit;
}

if(!isset($_POST['location']) || $_POST['location']==""){
    echo json_encode(['error'=>'Property Location mmust be submitted.']);
}
else if(!isset($_POST['family']) || $_POST['family']==""){
    echo json_encode(['error'=>'Family must be submitted.']);
}
else if(!isset($_POST['units']) || $_POST['units']==""){
    echo json_encode(['error'=>'Property Units must be submitted.']);
}
else if(!isset($_POST['sellingperunit']) || $_POST['sellingperunit']==""){
    echo json_encode(['error'=>'Property Selling price per Unit must be submitted.']);
}
else if(!isset($_POST['details']) || $_POST['details']==""){
    echo json_encode(['error'=>'Property Details must be submitted.']);
}
else{
    $userid='';
    if(isset($_POST['userid']) || $_POST['userid']!=""){
        $userid=$_POST['userid'];
    }
    $location=$_POST['location'];
    $family=$_POST['family'];
    $units=$_POST['units'];
    $sellingperunit=$_POST['sellingperunit'];
    $details=$_POST['details'];

    $query='INSERT INTO property (`userid`,`propertylocation`, `units`, `sellingpriceperunit`, `familyid`, `details`) 
        VALUES ("'.$userid.'","'.$location.'","'.$units.'","'.$sellingperunit.'","'.$family.'","'.$details.'")';
    if(mysqli_query($conn,$query)){
        echo json_encode(['success'=>'Property Saved.']);
    }
    else{
        echo json_encode(['error'=>'Saving Failed.']);
    }
}
?>