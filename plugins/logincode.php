<?php
include('../includes/dbconfig.php');
if(isset($_POST['test_login'])){

    $email = $_POST['email'];
    $pass  = $_POST['password'];

    if(empty($email)){

        function_alert("Email is empty");
        header("location: index.php");
    }
    else if(empty($pass)){
        function_alert("Password is empty");
        header("location: index.php");
    }
    else{
        $ref = 'superuser/';
        $fetchdata = $database->getReference($ref)->getValue();
        foreach($fetchdata as $key => $row){
            $dbEmail = $row['email'];
            $dbPass = $row['pass'];
        }
       
        if($email != $dbEmail && $pass != $dbPass){
            function_alert("Wrong Credentials Pls Contact the maintenance");
            header("location: index.php");
        }
        else{
            function_alert("Welcome Admin");
            header("location: test.php");
        }

    }
    
}
function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}



?>