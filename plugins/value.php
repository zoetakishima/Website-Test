<?php include('header.php'); ?>
<?php session_start(); ?>

    <!-- <div class="container">
        <div class="row"> -->
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
                                <a href="price.php" class="active"><i class="fa fa-table fa-fw"></i>Job List</a>
                            </li>
                            <li>
                                <a href="Totalsales.php"><i class="fa fa-edit fa-fw"></i>Sales</a>
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
                                $token = $_GET['token'];

                                include('../includes/dbconfig.php');
                                $ref = "users/".$token."/service";
                                $numchildren = $database->getReference($ref)->getSnapshot()->numChildren();
                                $getdata = $database->getReference($ref)->getValue();
                                $refvalue = "users/".$token."/value";
                                $valuechild = $database->getReference($refvalue)->getSnapshot()->numChildren();
                                $i=0;


                                if(isset($_SESSION['status'])&& $_SESSION['status'] != ""){
                                    ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Hey!</strong> <?php echo $_SESSION['status'];?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                            ?>
                                <h1 class="page-header"> Enter Value</h1>
                                <h5>
                                    ID: <?php echo $token ?>
                                </h5>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Job Price Quotation
                                    </div>
                                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <?php
                                                if($numchildren == 0){
                                                    echo 'Dont have Pending Job';
                                                }
                                                else{
                                                    ?>
                                                    <td>Jobs</td>
                                                    <?php
                                                    for($i=1 ; $i<= $numchildren ; $i++){
                                                        ?>
                                                            <td>Service</td>
                                                            <td>Price Quote</td>
                                                            
                                                    <?php
                                                    }
                                                    // if($valuechild != 0){

                                                    // }
                                                    // else{
                                                        ?>
                                                            <td>Enter Value</td>
                                                        <?php
                                                    // }
                                                    
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $x= 0;
                                                foreach($getdata as $key => $row){
                                                    $status = "1";
                                                    $x++;
                                                    ?>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="token" value="<?php echo $token;?>">
                                                        <tr>
                                                            <td>Job<?php echo $x;?> </td>

                                                            <?php
                                                                if(isset($row['service1'])){
                                                                    ?>
                                                                    <td><?php echo $row['service1'] ; ?></td>
                                                                    <?php
                                                                    $reftry2 = "users/".$token."/value/v".$x."/service1/service1";
                                                                    $getvalue = $database->getReference($reftry2)->getValue();
                                                                    if(isset($getvalue)){
                                                                        $status = 0;
                                                                        ?>
                                                                        <td><?php echo $getvalue ?></td>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <td><input type="number" name="service1Value" class="form-control" step="any" min="0"></td>
                                                                        <?php
                                                                    }
                                                                    
                                                                }
                                                            ?>

                                                            <?php
                                                                if(isset($row['service2'])){
                                                                    ?>
                                                                    <td><?php echo $row['service2'] ; ?></td>
                                                                    <?php
                                                                    $reftry2 = "users/".$token."/value/v".$x."/service2/service2";
                                                                    $getvalue = $database->getReference($reftry2)->getValue();
                                                                    if(isset($getvalue)){
                                                                        $status = 0;
                                                                        ?>
                                                                        <td><?php echo $getvalue ?></td>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <td><input type="number" name="service2Value" class="form-control" step="any" min="0"></td>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>

                                                            <?php
                                                                if(isset($row['service3'])){
                                                                    ?>
                                                                    <td><?php echo $row['service3'] ; ?></td>
                                                                    <?php
                                                                    $reftry2 = "users/".$token."/value/v".$x."/service3/service3";
                                                                    $getvalue = $database->getReference($reftry2)->getValue();
                                                                    if(isset($getvalue)){
                                                                        ?>
                                                                        <td><?php echo $getvalue ?></td>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <td><input type="number" name="service3Value" class="form-control" step="any" min="0"></td>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>

                                                            <?php
                                                                if(isset($row['service4'])){
                                                                    ?>
                                                                    <td><?php echo $row['service4'] ; ?></td>
                                                                    <?php
                                                                    $reftry2 = "users/".$token."/value/v".$x."/service4/service4";
                                                                    $getvalue = $database->getReference($reftry2)->getValue();
                                                                    if(isset($getvalue)){
                                                                        $status = 0;
                                                                        ?>
                                                                        <td><?php echo $getvalue ?></td>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <td><input type="number" name="service4Value" class="form-control" step="any" min="0"></td>
                                                                        <?php
                                                                    }

                                                                }
                                                            ?>

                                                            <?php
                                                                if(isset($row['service5'])){
                                                                    ?>
                                                                    <td><?php echo $row['service5'] ; ?></td>
                                                                    <?php
                                                                    $reftry2 = "users/".$token."/value/v".$x."/service5/service5";
                                                                    $getvalue = $database->getReference($reftry2)->getValue();
                                                                    if(isset($getvalue)){
                                                                        $status = 0;
                                                                        ?>
                                                                        <td><?php echo $getvalue ?></td>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <td><input type="number" name="service5Value" class="form-control" step="any" min="0"></td>
                                                                        <?php
                                                                    }

                                                                }

                                                                 if($status != 0){
                                                                    ?>
                                                                    <td>
                                                                        <input type="hidden" name="count" value=<?php echo $x?>>
                                                                        <button type ="submit" name="serviceValue" class="btn btn-primary">Submit</button>
                                                                    </td>
                                                                    <?php
                                                                 }
                                                                 else{
                                                                    
                                                                 }
                                                            ?>

                                                                
                                                        </tr>
                                                    </form>
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
                        </div>
                </div>
           </div>
        <!-- </div>
    </div> -->
<?php include('footer.php'); ?>