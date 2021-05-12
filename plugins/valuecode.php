<?php
session_start();
include('../includes/dbconfig.php');

if(isset($_POST['valueEnter'])){

    $token = $_POST['token'];
    $value1 = $_POST['service1Value'];
    $value2 = $_POST['service2Value'];
    $value3 = $_POST['service3Value'];
    $value4 = $_POST['service4Value'];
    $value5 = $_POST['service5Value'];
    // $refstatus = 'users/'.$token.'/serviceStatus/status1';
    $realref = "users/".$token."/value";
    $childnum = $database->getReference($ref)->getSnapshot()->numChildren();
    $childnum++;

    if(empty($value1)){
  
    }
    else{
        $realref = "users/".$token."/value/v".$childnum;
        $data = [
            'service1' => $value1
        ];
        $postdata = $database->getReference($realref)->push($data);
        if($postdata){
            $_SESSION['status'] = "Data Inserted Successfully";
            
            header("location: value.php?token=$token");
        }
        else{
            $_SESSION['status'] = "Data not Inserted, something went wrong";
            header("location: value.php?token=$token");
        }
    }

    if(empty($value2)){

    }
    else{
        $realref = "users/".$token."/value/v".$childnum;
        $data = [
            'service2' => $value2
        ];
        $postdata = $database->getReference($realref)->push($data);
        if($postdata){
            $_SESSION['status'] = "Data Inserted Successfully";
            $_SESSION['token'] = $token;
            header("location: value.php?token=$token");;
        }
        else{
            $_SESSION['status'] = "Data not Inserted, something went wrong";
            header("location: value.php?token=$token");
        }
    }

    if(empty($value3)){
        
    }
    else{
        $realref = "users/".$token."/value/v".$childnum;
        $data = [
            'service3' => $value3
        ];
        $postdata = $database->getReference($realref)->push($data);
        if($postdata){
            $_SESSION['status'] = "Data Inserted Successfully";
            $_SESSION['token'] = $token;
            header("location: value.php?token=$token");
        }
        else{
            $_SESSION['status'] = "Data not Inserted, something went wrong";
            header("location: value.php?token=$token");
        }
    }

    if(empty($value4)){
        
    }
    else{
        $realref = "users/".$token."/value/v".$childnum;
        $data = [
            'service4' => $value4
        ];
        $postdata = $database->getReference($realref)->push($data);
        if($postdata){
            $_SESSION['status'] = "Data Inserted Successfully";
            $_SESSION['token'] = $token;
            header("location: value.php?token=$token");
        }
        else{
            $_SESSION['status'] = "Data not Inserted, something went wrong";
            header("location: value.php?token=$token");
        }
    }

    if(empty($value5)){
        
    }
    else{
        $realref = "users/".$token."/value/v".$childnum;
        $data = [
            'service5' => $value5
        ];
        $postdata = $database->getReference($realref)->push($data);
        if($postdata){
            $_SESSION['status'] = "Data Inserted Successfully";
            $_SESSION['token'] = $token;
            header("location: value.php?token=$token");
        }
        else{
            $_SESSION['status'] = "Data not Inserted, something went wrong";
            header("location: value.php?token=$token");
        }
    }

    // $datastatus = [
    //     'status' => 'Accepted'
    // ];
    // $database->getReference($refstatus)->update($datastatus);
}