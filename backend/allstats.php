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

$querytrials='SELECT * FROM trial ORDER BY id DESC';
$queryprojects='SELECT * FROM project ORDER BY id DESC';
$queryfamilies='SELECT * FROM family ORDER BY id DESC';
$queryproperties='SELECT * FROM property ORDER BY id DESC';
$querymembers='SELECT * FROM member ORDER BY id DESC';

$trials=0;$projects=0;$families=0;$properties=0;$members=0;

$response=array();
if($resulttrials=mysqli_query($conn,$querytrials)){
    $trials=mysqli_num_rows($resulttrials);
}
if($resultprojects=mysqli_query($conn,$queryprojects)){
    $projects=mysqli_num_rows($resultprojects);
}
if($resultfamilies=mysqli_query($conn,$queryfamilies)){
    $families=mysqli_num_rows($resultfamilies);
}
if($resultproperties=mysqli_query($conn,$queryproperties)){
    $properties=mysqli_num_rows($resultproperties);
}
if($resultmembers=mysqli_query($conn,$querymembers)){
    $members=mysqli_num_rows($resultmembers);
}

$response[]=array(
    'trials'=>$trials,
    'projects'=>$projects,
    'families'=>$families,
    'properties'=>$properties,
    'members'=>$members,
);
echo json_encode(['success'=>'Success', 'response'=>$response]);

?>