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

$query='SELECT * FROM property ORDER BY id DESC';

if($result=mysqli_query($conn,$query)){
    $response=array();
    if(mysqli_num_rows($result)>0){
        $no=0;
        while($row=mysqli_fetch_array($result)){
            $no++;
            $response[]=array(
                'no'=>$no,
                'id'=>$row['id'],
                'propertylocation'=>$row['propertylocation'],
                'units'=>$row['units'],
                'sellingpriceperunit'=>$row['sellingpriceperunit'],
                'familyid'=>$row['familyid'],
                'details'=>$row['details'],
            );
        }
        echo json_encode(['success'=>'Success', 'response'=>$response]);
    }
    else{
        echo json_encode(['error'=>'No Property Found.']);
    }
}
else{
    echo json_encode(['error'=>'Failed due to Error in Server.']);
}
?>