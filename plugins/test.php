<?php include('header.php'); ?>
<?php
    // $token = $_GET['token'];

     include('../includes/dbconfig.php');
     $ref = "users/";
     $numchildren = $database->getReference($ref)->getSnapshot()->numChildren();
     $getdata = $database->getReference($ref)->getValue();
     ?>

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
                                <a href="test.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="userlist.php"><i class="fa fa-bar-chart-o fa-fw"></i>User List</a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="price.php"><i class="fa fa-table fa-fw"></i>Job List</a>
                            </li>
                            <li>
                                <a href="Totalsales.php"><i class="fa fa-edit fa-fw"></i>Sales</a>
                            </li>
                            <li>
                                <a href="Servicelist.php" class="active"><i class="fa fa-wrench fa-fw"></i>Service List</span></a>
                            </li>
                            <!--<li>
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
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $numchildren ?></div>
                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="userlist.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php 
                                                $acceptedcount =0;
                                                foreach($getdata as $key => $test){
                                                    $uid = $test['uid'];

                                                    $refStatus = "users/".$uid."/serviceStatus";
                                                    $statuschild = $database->getReference($refStatus)->getSnapshot()->numChildren();
                                                    $statuschildDb = $database->getReference($refStatus)->getValue();

                                                    foreach($statuschildDb as $key => $testStatus){
                                                        if(isset($testStatus['status'])){
                                                            if($testStatus['status'] == 'Accepted'){
                                                                $acceptedcount++;
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                            ?>
                                            <div class="huge"><?php echo $acceptedcount?></div>
                                            <div>Accepted Job</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php 
                                                $pendingcount =0;
                                                foreach($getdata as $key => $test){
                                                    $uid = $test['uid'];

                                                    $refStatus = "users/".$uid."/serviceStatus";
                                                    $statuschild = $database->getReference($refStatus)->getSnapshot()->numChildren();
                                                    $statuschildDb = $database->getReference($refStatus)->getValue();

                                                    foreach($statuschildDb as $key => $testStatus){
                                                        if(isset($testStatus['status'])){
                                                            if($testStatus['status'] == 'Pending'){
                                                                $pendingcount++;
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                            ?>
                                            <div class="huge"><?php echo $pendingcount?></div>
                                            <div>Pending Job</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                                if($acceptedcount == 0){
                                                    ?>
                                                        <div class="huge"><?php echo 0?></div>
                                                    <?php
                                                }
                                                else{
                                                    $reftotalSales = "superuser/-M_QeOGuxkpyV_KG0-ol";
                                                    $getTotalSales = $database->getReference($reftotalSales)->getValue();
                                                    foreach($getTotalSales as $key => $sales){
                                                        if(isset($sales['totalSales'])){
                                                        
                                                        ?>
                                                            <div class="huge"><?php echo $sales['totalSales']?></div>
                                                        <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                            
                                            <div>Total Sales</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="Totalsales.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                      
                        <!-- /.col-lg-8 -->
                        <!-- /.col-lg-4 -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


 <?php include('footer.php'); ?>