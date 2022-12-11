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

if(!isset($_GET['userid']) || $_GET['userid']==""){
    echo json_encode(['error'=>'Please Login.']);
}
else{
    
    $userid=$_GET['userid'];

    $querytrials='SELECT * FROM trial where userid="'.$userid.'" ORDER BY id DESC';
    $queryprojects='SELECT * FROM project where userid="'.$userid.'" ORDER BY id DESC';
    $queryfamilies='SELECT * FROM family where userid="'.$userid.'" ORDER BY id DESC';
    $queryproperties='SELECT * FROM property where userid="'.$userid.'" ORDER BY id DESC';
    $querymembers='SELECT * FROM member where userid="'.$userid.'" ORDER BY id DESC';

    $jantrials=0;$janprojects=0;$janfamilies=0;$janproperties=0;$janmembers=0;
    $febtrials=0;$febprojects=0;$febfamilies=0;$febproperties=0;$febmembers=0;
    $martrials=0;$marprojects=0;$marfamilies=0;$marproperties=0;$marmembers=0;
    $aprtrials=0;$aprprojects=0;$aprfamilies=0;$aprproperties=0;$aprmembers=0;
    $maytrials=0;$mayprojects=0;$mayfamilies=0;$mayproperties=0;$maymembers=0;
    $juntrials=0;$junprojects=0;$junfamilies=0;$junproperties=0;$junmembers=0;
    $jultrials=0;$julprojects=0;$julfamilies=0;$julproperties=0;$julmembers=0;
    $augtrials=0;$augprojects=0;$augfamilies=0;$augproperties=0;$augmembers=0;
    $septrials=0;$sepprojects=0;$sepfamilies=0;$sepproperties=0;$sepmembers=0;
    $octtrials=0;$octprojects=0;$octfamilies=0;$octproperties=0;$octmembers=0;
    $novtrials=0;$novprojects=0;$novfamilies=0;$novproperties=0;$novmembers=0;
    $dectrials=0;$decprojects=0;$decfamilies=0;$decproperties=0;$decmembers=0;

    $year=date('Y');
    // $year.'-01'
    $response=array();
    if($resulttrials=mysqli_query($conn,$querytrials)){
        if(mysqli_num_rows($resulttrials)>0){
            while($row=mysqli_fetch_array($resulttrials)){
                $created_at=$row['created_at'];
                if(strpos($created_at,$year.'-01') !==false){
                    $jantrials++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febtrials++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $martrials++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprtrials++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $maytrials++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $juntrials++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $jultrials++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augtrials++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $septrials++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octtrials++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novtrials++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $dectrials++;
                }
            }
        }
    }
    if($resultprojects=mysqli_query($conn,$queryprojects)){
        if(mysqli_num_rows($resultprojects)>0){
            while($row=mysqli_fetch_array($resultprojects)){
                $created_at=$row['created_at'];
                if(strpos($created_at,$year.'-01') !==false){
                    $janprojects++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febprojects++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marprojects++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprprojects++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayprojects++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junprojects++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julprojects++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augprojects++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepprojects++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octprojects++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novprojects++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decprojects++;
                }
            }
        }
    }
    if($resultfamilies=mysqli_query($conn,$queryfamilies)){
        if(mysqli_num_rows($resultfamilies)>0){
            while($row=mysqli_fetch_array($resultfamilies)){
                $created_at=$row['created_at'];
                if(strpos($created_at,$year.'-01') !==false){
                    $janfamilies++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febfamilies++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marfamilies++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprfamilies++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayfamilies++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junfamilies++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julfamilies++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augfamilies++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepfamilies++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octfamilies++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novfamilies++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decfamilies++;
                }
            }
        }
    }
    if($resultproperties=mysqli_query($conn,$queryproperties)){
        if(mysqli_num_rows($resultproperties)>0){
            while($row=mysqli_fetch_array($resultproperties)){
                $created_at=$row['created_at'];
                if(strpos($created_at,$year.'-01') !==false){
                    $janproperties++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febproperties++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marproperties++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprproperties++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $mayproperties++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junproperties++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julproperties++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augproperties++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepproperties++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octproperties++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novproperties++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decproperties++;
                }
            }
        }
    }
    if($resultmembers=mysqli_query($conn,$querymembers)){
        if(mysqli_num_rows($resultmembers)>0){
            while($row=mysqli_fetch_array($resultmembers)){
                $created_at=$row['created_at'];
                if(strpos($created_at,$year.'-01') !==false){
                    $janmembers++;
                }
                else if(strpos($created_at,$year.'-02') !==false){
                    $febmembers++;
                }
                else if(strpos($created_at,$year.'-03') !==false){
                    $marmembers++;
                }
                else if(strpos($created_at,$year.'-04') !==false){
                    $aprmembers++;
                }
                else if(strpos($created_at,$year.'-05') !==false){
                    $maymembers++;
                }
                else if(strpos($created_at,$year.'-06') !==false){
                    $junmembers++;
                }
                else if(strpos($created_at,$year.'-07') !==false){
                    $julmembers++;
                }
                else if(strpos($created_at,$year.'-08') !==false){
                    $augmembers++;
                }
                else if(strpos($created_at,$year.'-09') !==false){
                    $sepmembers++;
                }
                else if(strpos($created_at,$year.'-10') !==false){
                    $octmembers++;
                }
                else if(strpos($created_at,$year.'-11') !==false){
                    $novmembers++;
                }
                else if(strpos($created_at,$year.'-12') !==false){
                    $decmembers++;
                }
            }
        }
    }

    $response[]=array(
        'jantrials'=>$jantrials,
        'janprojects'=>$janprojects,
        'janfamilies'=>$janfamilies,
        'janproperties'=>$janproperties,
        'janmembers'=>$janmembers,
        'febtrials'=>$febtrials,
        'febprojects'=>$febprojects,
        'febfamilies'=>$febfamilies,
        'febproperties'=>$febproperties,
        'febmembers'=>$febmembers,
        'martrials'=>$martrials,
        'marprojects'=>$marprojects,
        'marfamilies'=>$marfamilies,
        'marproperties'=>$marproperties,
        'marmembers'=>$marmembers,
        'aprtrials'=>$aprtrials,
        'aprprojects'=>$aprprojects,
        'aprfamilies'=>$aprfamilies,
        'aprproperties'=>$aprproperties,
        'aprmembers'=>$aprmembers,
        'maytrials'=>$maytrials,
        'mayprojects'=>$mayprojects,
        'mayfamilies'=>$mayfamilies,
        'mayproperties'=>$mayproperties,
        'maymembers'=>$maymembers,
        'juntrials'=>$juntrials,
        'junprojects'=>$junprojects,
        'junfamilies'=>$junfamilies,
        'junproperties'=>$junproperties,
        'junmembers'=>$junmembers,
        'jultrials'=>$jultrials,
        'julprojects'=>$julprojects,
        'julfamilies'=>$julfamilies,
        'julproperties'=>$julproperties,
        'julmembers'=>$julmembers,
        'augtrials'=>$augtrials,
        'augprojects'=>$augprojects,
        'augfamilies'=>$augfamilies,
        'augproperties'=>$augproperties,
        'augmembers'=>$augmembers,
        'septrials'=>$septrials,
        'sepprojects'=>$sepprojects,
        'sepfamilies'=>$sepfamilies,
        'sepproperties'=>$sepproperties,
        'sepmembers'=>$sepmembers,
        'octtrials'=>$octtrials,
        'octprojects'=>$octprojects,
        'octfamilies'=>$octfamilies,
        'octproperties'=>$octproperties,
        'octmembers'=>$octmembers,
        'novtrials'=>$novtrials,
        'novprojects'=>$novprojects,
        'novfamilies'=>$novfamilies,
        'novproperties'=>$novproperties,
        'novmembers'=>$novmembers,
        'dectrials'=>$dectrials,
        'decprojects'=>$decprojects,
        'decfamilies'=>$decfamilies,
        'decproperties'=>$decproperties,
        'decmembers'=>$decmembers,
    );
    echo json_encode(['success'=>'Success', 'response'=>$response]);
}

?>