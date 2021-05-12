<?php include('header.php'); ?>

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
                  <!--  <li>
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
                    <h1 class="page-header">Edit User</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php
                                $uid = $_GET['token'];
                            ?>
                            ID: <?php echo $uid?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <div class="col-md-6">
                                <?php
                                    $token = $_GET['token'];

                                    include('../includes/dbconfig.php');
                                    $ref = "users/";
                                    $getdata = $database->getReference($ref)->getChild($token)->getValue();
                                ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                                        <div class="form-group">
                                            <input type="text" name="userName" class="form-control" value="<?php echo $getdata['userName']?>" placeholder="Enter Username">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" value="<?php echo $getdata['email']?>" placeholder="Enter Email">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="phoneno" class="form-control" value="<?php echo $getdata['contactNum']?>" placeholder="Enter PhoneNumber">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="pass" class="form-control" value="<?php echo $getdata['pass']?>" placeholder="Enter Password">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update_data" class="btn btn-primary">Update Data</button>
                                            <a href="userlist.php" class="btn btn-danger">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include('footer.php'); ?>