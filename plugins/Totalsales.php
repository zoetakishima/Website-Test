<?php include('header.php'); ?>
<?php session_start(); ?>

<div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="test.php">Otto</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="test.php"><i class="fa fa-home fa-fw"></i>Home</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">  
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
                            include('../includes/dbconfig.php');
                            $refname = "superuser/";
                            $getusername = $database->getReference($refname)->getValue();
                            foreach($getusername as $key => $username){
                                if(isset($username['userName'])){
                                    $UN = $username['userName'];
                                    ?>
                                    <i class="fa fa-user fa-fw"></i> <?php echo $UN ?> <b class="caret"></b>
                                    <?php
                                }
                            }
                        ?>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="test.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="userlist.php"  ><i class="fa fa-bar-chart-o fa-fw"></i>User List</a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="price.php"><i class="fa fa-table fa-fw"></i>Job List</a>
                            </li>
                            <li>
                                <a href="Totalsales.php" class="active"><i class="fa fa-edit fa-fw"></i>Sales</a>
                            </li>
                            <li>
                                <a href="Servicelist.php"><i class="fa fa-wrench fa-fw"></i>Service List</span></a>
                            </li>
                           <!-- <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                                
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                if(isset($_SESSION['status'])&& $_SESSION['status'] != ""){
                                    ?>
                                    <div class="alert alert-warning alert-dismissable fade show" role="alert">
                                        <strong>Hey!</strong> <?php echo $_SESSION['status'];?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                            ?>
                            <h1 class="page-header">Sales</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Main Sales Table
                                </div>
                                <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-stripped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Total Sales</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        include('../includes/dbconfig.php');
                                        $ref = 'users/';
                                        $fetchdata = $database->getReference($ref)->getValue();
                                        $total = 0;
                                        if($fetchdata > 0){
                                            foreach($fetchdata as $key => $row){
                                                $i = 0;
                                                $totalvalue = 0;
                                                
                                                $userID = $row['uid'];
                                                $reftest = "users/".$userID."/service";
                                                $numchildren = $database->getReference($reftest)->getSnapshot()->numChildren();
                                                ?>
                                            <tr>
                                                <?php
                                                    if(empty($row['uid'])){
                                                ?>
                                                    <td>Data Is Empty</td>
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                    <td><?php echo $row['uid']?></td>
                                                <?php
                                                    }

                                                    if(empty($row['value'])){
                                                        ?>
                                                        <td>Data Is Empty</td>
                                                        <?php
                                                    }
                                                    else{
                                            
                                                        while($i != $numchildren){
                                                            $i++;
                                                            $refValue = 'users/'.$userID.'/value/v'.$i;
                                                            $fetchdataValue = $database->getReference($refValue)->getValue();
                                                            if($fetchdata == ''){

                                                            }
                                                            else{
                                                                foreach($fetchdataValue as $key => $value){
                                                                    if(empty($value['service1'])){
                                                                    }
                                                                    else{
                                                                        $float1 = floatval($value['service1']);
                                                                        $totalvalue += $float1;
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                    if(empty($value['service2'])){
         
                                                                    }
                                                                    else{
                                                                        $float1 = floatval($value['service2']);
                                                                        $totalvalue += $float1;
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                    if(empty($value['service3'])){
                                                                    }
                                                                    else{
                                                                        $float1 = floatval($value['service3']);
                                                                        $totalvalue += $float1;
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                    if(empty($value['service4'])){
                                                               
                                                                    }
                                                                    else{
                                                                        $float1 = floatval($value['service4']);
                                                                        $totalvalue += $float1;
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                    if(empty($value['service5'])){
                                                                       
                                                                    }
                                                                    else{
                                                                        $float1 = floatval($value['service5']);
                                                                        $totalvalue += $float1;
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                 }
                                                            }
                                                        }

                                                        $total += $totalvalue;
                                                        $refsuperuser = "superuser/-M_QeOGuxkpyV_KG0-ol/totalSales";
                                                        $data = [
                                                            'totalSales' => $total
                                                        ];
                                                        $database->getReference($refsuperuser)->set($data);
                                                        ?>

                                                        <td><?php echo $totalvalue?></td>
                                                        <?php
                                                    }
                                                ?>

                                                
                                             </tr>
                                             <?php
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <td>Total Sales</td>
                                        <td><?php echo $total?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                    $refuser = "users";
                    $getusers = $database->getReference($refuser)->getValue();
                    foreach($getusers as $key => $testData){
                        $user = $testData['userName'];
                        $idtest = $testData['uid'];
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4> Username: <?php echo $user?> </h4>
                                        <p class="help-block"> ID: <?php echo $idtest?></p>
                                        <a href="print.php?token=<?php echo $idtest?>" class="btn btn-primary">Print</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Job Number</th>
                                                        <th>Total Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                        $jobcountref = "users/".$idtest."/service";
                                                        $jobcount = $database->getReference($jobcountref)->getSnapshot()->numChildren();
                                                        for($y = 1 ; $y <= $jobcount ; $y++){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $y?></td>
                                                                <?php
                                                                    $refValue = 'users/'.$idtest.'/value/v'.$y;
                                                                    $fetchdataValue = $database->getReference($refValue)->getValue();
                                                                    if($fetchdata == ''){
                                                                        
                                                                    }
                                                                    else{
                                                                        $valueeachjob = 0;
                                                                        foreach($fetchdataValue as $key => $value){
                                                                            
                                                                            if(empty($value['service1'])){
                                                                            }
                                                                            else{
                                                                                $float1 = floatval($value['service1']);
                                                                                $valueeachjob += $float1;
                                                                            }
                                                                            if(empty($value['service2'])){
                                                                            }
                                                                            else{
                                                                                $float1 = floatval($value['service2']);
                                                                                $valueeachjob += $float1;
                                                                            }
                                                                            if(empty($value['service3'])){
                                                                            }
                                                                            else{
                                                                                $float1 = floatval($value['service3']);
                                                                                $valueeachjob += $float1;
                                                                            }
                                                                            if(empty($value['service4'])){
                                                                            }
                                                                            else{
                                                                                $float1 = floatval($value['service4']);
                                                                                $valueeachjob += $float1;
                                                                            }
                                                                            if(empty($value['service5'])){ 
                                                                            }
                                                                            else{
                                                                                $float1 = floatval($value['service5']);
                                                                                $valueeachjob += $float1;
                                                                            }
                                                                            
                                                                        }
                                                                        ?>
                                                                            <td><?php echo $valueeachjob?></td>
                                                                            <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                </tbody>                     
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                ?>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('footer.php'); ?>