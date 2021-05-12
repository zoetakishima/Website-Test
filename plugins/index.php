<?php
session_name('LoginForm');
@session_start();

error_reporting(0);
include("config.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="../js/main.js"></script>
    <style class="cp-pen-styles">
    </style>
</head>
<body>


<div class="wrapper">
 <div class="container">
        <h1>Welcome</h1>
            <form id="login-form" class="login-form" name="form1" method="post" action="logincode.php">
                <input type="hidden" name="is_login" value="1">
                        <input id="email" name="email" class="required" type="email" placeholder="Email">
                        <input id="password" name="password" class="required" type="password" placeholder="Password">
                        <div class="row"><button name="test_login">Login</button></div>
             </form>
     
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <!-- The core Firebase JS SDK is always required and must be listed first -->
     <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-analytics.js"></script>
    <script src="firebase.js"></script>
    <script src="login.js"></script>
</body>
</html>