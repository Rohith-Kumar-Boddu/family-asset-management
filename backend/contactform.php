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

if(!isset($_POST['name']) || $_POST['name']==""){
    echo json_encode(['error'=>'Name must be submitted.']);
}
else if(!isset($_POST['email']) || $_POST['email']==""){
    echo json_encode(['error'=>'Email must be submitted.']);
}
else if(!isset($_POST['question']) || $_POST['question']==""){
    echo json_encode(['error'=>'Question must be submitted.']);
}
else{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $question=$_POST['question'];

    $query='INSERT INTO contactform (`names`, `email`, `question`) VALUES ("'.$name.'","'.$email.'","'.$question.'")';
    if(mysqli_query($conn,$query)){
        echo json_encode(['success'=>'Your Question has been Sent.']);
    }
    else{
        echo json_encode(['error'=>'Could not Submit.']);
    }
}
?>