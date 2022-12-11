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

if(!isset($_POST['email']) || $_POST['email']==""){
    echo json_encode(['error'=>'Email must be submitted.']);
}
else if(!isset($_POST['password']) || $_POST['password']==""){
    echo json_encode(['error'=>'Password must be submitted.']);
}
else{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query='SELECT * FROM users where `email`="'.$email.'"  and `password`="'.$password.'"';

    if($result=mysqli_query($conn,$query)){
        if(mysqli_num_rows($result)==1){
            while($row=mysqli_fetch_array($result)){
                $res['success']='Signed In';
                $res['account']=array(
                    'id'=>$row['id'],
                    'email'=>$row['email'],
                    'firstname'=>$row['firstname'],
                    'lastname'=>$row['lastname'],
                    'gender'=>$row['gender'],
                    'role'=>$row['role'],
                    'phone'=>$row['phone'],
                );
                echo json_encode($res);
            }
        }
        else{
            echo json_encode(['error'=>'Account not Found.']);
        }
    }
    else{
        echo json_encode(['error'=>'Failed due to Error in Server.']);
    }
}
?>