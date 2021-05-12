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
                            <h1 class="page-header">Service</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Service List
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-stripped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td>Service</td>
                                                    <td>smthing</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $refsuperuser = "superuser/-M_QeOGuxkpyV_KG0-ol/servicelist";
                                                    $childservicelist = $database->getReference($refsuperuser)->getSnapshot()->numChildren();
                                                    $getservice = $database->getReference($refsuperuser)->getValue();
                                                    foreach($getservice as $key => $testService){
                                                        ?>
                                                        <tr>
                                                        <?php
                                                        for($z = 1 ; $z <= $childservicelist ; $z++){
                                                            if(isset($testService['service'.$z])){
                                                                ?>
                                                                    <td name="service<?php echo $z?>"><?php echo $testService['service'.$z]?></td>
                                                                    <form action="code.php" method="POST">
                                                                        <input type="hidden" name = "magicnumber" value="<?php echo $z;?>">
                                                                        <td><button type="submit" name="dlt_service" class="btn btn-danger">Delete</button></td>
                                                                    </form>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                                
                                                </tr>
                                                <tr>
                                                    <form action="code.php" method="POST">
                                                        <td><a href="addservice.php" class="btn btn-primary">Add</a></td>
                                                    </form>
                                                </tr>

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
<?php include('footer.php'); ?>