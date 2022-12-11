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
    echo json_encode(['error'=>'Project Location mmust be submitted.']);
}
else if(!isset($_POST['family']) || $_POST['family']==""){
    echo json_encode(['error'=>'Family must be submitted.']);
}
else if(!isset($_POST['cost']) || $_POST['cost']==""){
    echo json_encode(['error'=>'Project Cost must be submitted.']);
}
else if(!isset($_POST['projectname']) || $_POST['projectname']==""){
    echo json_encode(['error'=>'Project Name must be submitted.']);
}
else if(!isset($_POST['details']) || $_POST['details']==""){
    echo json_encode(['error'=>'Project Details must be submitted.']);
}
else{
    $userid='';
    if(isset($_POST['userid']) || $_POST['userid']!=""){
        $userid=$_POST['userid'];
    }
    $location=$_POST['location'];
    $family=$_POST['family'];
    $cost=$_POST['cost'];
    $projectname=$_POST['projectname'];
    $details=$_POST['details'];

    $query='INSERT INTO project (`userid`,`projectname`, `projectlocation`, `cost`, `familyid`, `details`) 
        VALUES ("'.$userid.'","'.$projectname.'","'.$location.'","'.$cost.'","'.$family.'","'.$details.'")';
    if(mysqli_query($conn,$query)){
        echo json_encode(['success'=>'Project Saved.']);
    }
    else{
        echo json_encode(['error'=>'Saving Failed.']);
    }
}
?>