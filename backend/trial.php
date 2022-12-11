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

if(!isset($_POST['status']) || $_POST['status']==""){
    echo json_encode(['error'=>'Trial Status must be submitted.']);
}
else if(!isset($_POST['family']) || $_POST['family']==""){
    echo json_encode(['error'=>'Trial Family must be submitted.']);
}
else if(!isset($_POST['details']) || $_POST['details']==""){
    echo json_encode(['error'=>'Trial Details must be submitted.']);
}
else{
    $userid='';
    if(isset($_POST['userid']) || $_POST['userid']!=""){
        $userid=$_POST['userid'];
    }
    $status=$_POST['status'];
    $family=$_POST['family'];
    $details=$_POST['details'];

    $query='INSERT INTO trial (`userid`,`familyid`, `details`, `status`) VALUES ("'.$userid.'","'.$family.'","'.$details.'","'.$status.'")';
    if(mysqli_query($conn,$query)){
        echo json_encode(['success'=>'Trial Saved.']);
    }
    else{
        echo json_encode(['error'=>'Saving Failed.']);
    }
}
?>