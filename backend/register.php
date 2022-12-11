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

if(!isset($_POST['firstname']) || $_POST['firstname']==""){
    echo json_encode(['error'=>'First Name must be submitted.']);
}
else if(!isset($_POST['lastname']) || $_POST['lastname']==""){
    echo json_encode(['error'=>'Last Name must be submitted.']);
}
else if(!isset($_POST['email']) || $_POST['email']==""){
    echo json_encode(['error'=>'Email must be submitted.']);
}
else if(!isset($_POST['password']) || $_POST['password']==""){
    echo json_encode(['error'=>'Password must be submitted.']);
}
else if(!isset($_POST['gender']) || $_POST['gender']==""){
    echo json_encode(['error'=>'Gender must be submitted.']);
}
else if(!isset($_POST['ancestor']) || $_POST['ancestor']==""){
    echo json_encode(['error'=>'Ancestor must be submitted.']);
}
else if(!isset($_POST['ancestorrelation']) || $_POST['ancestorrelation']==""){
    echo json_encode(['error'=>'Ancestor Relation must be submitted.']);
}
else if(!isset($_POST['phone']) || $_POST['phone']==""){
    echo json_encode(['error'=>'Phone must be submitted.']);
}
else if(!isset($_POST['role']) || $_POST['role']==""){
    echo json_encode(['error'=>'Role must be submitted.']);
}
else{
    $lastname=$_POST['lastname'];
    $firstname=$_POST['firstname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $ancestor=$_POST['ancestor'];
    $ancestorrelation=$_POST['ancestorrelation'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];

    $query='INSERT INTO users (`firstname`, `lastname`, `email`, `gender`, `ancestor`, `ancestorrelation`, `password`, `phone`, `role`)
     VALUES ("'.$firstname.'","'.$lastname.'","'.$email.'","'.$gender.'","'.$ancestor.'","'.$ancestorrelation.'","'.$password.'","'.$phone.'","'.$role.'")';
    if(mysqli_query($conn,$query)){
        echo json_encode(['success'=>'Your Registration is Successful.']);
    }
    else{
        echo json_encode(['error'=>'Registration Failed.']);
    }
}
?>