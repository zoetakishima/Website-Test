<?php
session_start();
include('../includes/dbconfig.php');
if(isset($_POST['save_push_data']))
{
    
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $pass = $_POST['pass'];

    $data = [
        'userName' => $username,
        'email' => $email,
        'phoneno' => $phoneno,
        'pass' => $pass
    ];

    $ref = "superuser/";
    $postdata = $database->getReference($ref)->push($data);

    if($postdata){
        $_SESSION['status'] = "Data Inserted Successfully";
        header("location: userlist.php");
    }
    else{
        $_SESSION['status'] = "Data not Inserted, something went wrong";
        header("location: userlist.php");
    }
}
else if(isset($_POST['update_data'])){

    $username = $_POST['userName'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $pass = $_POST['pass'];
    $token = $_POST['token'];

    $data = [
        'userName' => $username,
        'email' => $email,
        'phoneno' => $phoneno,
        'pass' => $pass
    ];

    $ref = "users/".$token;
    $postdata = $database->getReference($ref)->update($data);

    if($postdata){
        $_SESSION['status'] = "Data updated Successfully";
        header("location: userlist.php");
    }
    else{
        $_SESSION['status'] = "Data not updated, something went wrong";
        header("location: userlist.php");
    }
}
else if(isset($_POST['delete_data'])){
    $token = $_POST['ref_token_delete'];
    $ref = "users/".$token;
    $deleteData = $database->getReference($ref)->remove();

    if($deleteData){
        $_SESSION['status'] = "Data Deleted Successfully";
        header("location: userlist.php");
    }
    else{
        $_SESSION['status'] = "Data not Deleted, something went wrong";
        header("location: userlist.php");
    }
}
else if(isset($_POST['serviceValue'])){

    $token = $_POST['token'];
    $count = $_POST['count'];
    $ref = "users/".$token."/value";
    $childnum = $database->getReference($ref)->getSnapshot()->numChildren();
    $childnum++;
    $s1value = $_POST['service1Value'];
    $s2value = $_POST['service2Value'];
    $s3value = $_POST['service3Value'];
    $s4value = $_POST['service4Value'];
    $s5value = $_POST['service5Value'];

    if(empty($s1value) && empty($s2value) && empty($s3value) && empty($s4value) && empty($s5value)){
        $_SESSION['status'] = "Data is empty pls enter correct value";
        header("location: value.php?token=$token");
    }
    else{

        if(isset($s1value)){
            $realref = "users/".$token."/value/v".$childnum."/service1";
            $data =[
                'service1' => $s1value
            ];         
            $postdata = $database->getReference($realref)->set($data);
            if($postdata){
                $_SESSION['status'] = "Data Inserted Successfully";
                header("location: value.php?token=$token");
            }
            else{
                $_SESSION['status'] = "Data not Inserted, something went wrong";
                header("location: value.php?token=$token");
            }
        }
        else{
    
        }
        if(isset($s2value)){
            $realref = "users/".$token."/value/v".$childnum."/service2";
            $data =[
                'service2' => $s2value
            ];
    
            $postdata = $database->getReference($realref)->set($data);
            if($postdata){
                $_SESSION['status'] = "Data Inserted Successfully";
                header("location: value.php?token=$token");
            }
            else{
                $_SESSION['status'] = "Data not Inserted, something went wrong";
                header("location: value.php?token=$token");
            }
        }
        else{
            
        }
        if(isset($s3value)){
            $realref = "users/".$token."/value/v".$childnum."/service3";
            $data =[
                'service3' => $s3value
            ];
    
            $postdata = $database->getReference($realref)->set($data);
            if($postdata){
                $_SESSION['status'] = "Data Inserted Successfully";
                header("location: value.php?token=$token");
            }
            else{
                $_SESSION['status'] = "Data not Inserted, something went wrong";
                header("location: value.php?token=$token");
            }
        }
        else{
            
        }
        if(isset($s4value)){
            $realref = "users/".$token."/value/v".$childnum."/service4";
            $data =[
                'service4' => $s4value
            ];
    
            $postdata = $database->getReference($realref)->set($data);
            if($postdata){
                $_SESSION['status'] = "Data Inserted Successfully";
                header("location: value.php?token=$token");
            }
            else{
                $_SESSION['status'] = "Data not Inserted, something went wrong";
                header("location: value.php?token=$token");
            }
        }
        else{
            
        }
        if(isset($s5value)){
            $realref = "users/".$token."/value/v".$childnum."/service5";
            $data =[
                'service5' => $s5value
            ];
    
            $postdata = $database->getReference($realref)->set($data);
            if($postdata){
                $_SESSION['status'] = "Data Inserted Successfully";
                header("location: value.php?token=$token");
            }
            else{
                $_SESSION['status'] = "Data not Inserted, something went wrong";
                header("location: value.php?token=$token");
            }
        }
        else{
            
        }

        $refStatus = "users/".$token.'/serviceStatus/status'.$count;
        $dataStatus = [
            'status' => 'Accepted'
        ];
        $database->getReference($refStatus)->update($dataStatus);

    }
}
else if(isset($_POST['addservice'])){
    $NewService = $_POST['newService'];
    $refservice = "superuser/-M_QeOGuxkpyV_KG0-ol/servicelist";
    $childcount = $database->getReference($refservice)->getSnapshot()->numChildren();
    $childcount++;
    $refservice2 = "superuser/-M_QeOGuxkpyV_KG0-ol/servicelist/service".$childcount;
    $data =[
        'service'.$childcount =>$NewService
    ];
    $postdata = $database->getReference($refservice2)->set($data);
    if($postdata){
        $_SESSION['status'] = "Data Inserted Successfully";
        header("location: Servicelist.php");
    }
    else{
        $_SESSION['status'] = "Data not Inserted, something went wrong";
        header("location: Servicelist.php");
    }
}
else if(isset($_POST['dlt_service'])){
    
    $count = $_POST['magicnumber'];
    $serviceDelete = $_POST['service'.$count];
    $refsuperuser = "superuser/-M_QeOGuxkpyV_KG0-ol/servicelist/".$serviceDelete;

    $deleteService = $database->getReference($refsuperuser)->remove();
    
}