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

if(!isset($_POST['userid']) || $_POST['userid']==""){
    echo json_encode(['error'=>'Please Login.']);
}
else if(!isset($_POST['family']) || $_POST['family']==""){
    echo json_encode(['error'=>'Family Name must be submitted.']);
}

else if(!isset($_POST['membername']) || $_POST['membername']==""){
    echo json_encode(['error'=>'Member Name must be submitted.']);
}
else if(!isset($_POST['location']) || $_POST['location']==""){
    echo json_encode(['error'=>'Member Location must be submitted.']);
}
else{
    $userid=$_POST['userid'];
    $family=$_POST['family'];
    $membername=$_POST['membername'];
    $location=$_POST['location'];

    $query='INSERT INTO member (`userid`, `familyid`, `membername`, `memberlocation`) VALUES ("'.$userid.'","'.$family.'","'.$membername.'","'.$location.'")';
    if(mysqli_query($conn,$query)){
        echo json_encode(['success'=>'Member Saved.']);
    }
    else{
        echo json_encode(['error'=>'Saving Failed.']);
    }
}
?>