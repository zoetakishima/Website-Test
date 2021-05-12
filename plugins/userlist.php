<?php include('header.php'); ?>
<?php session_start(); ?>

<!-- <div class="container">
    <div class="row"> -->
        <div class="col-md-12">
            <?php

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
        </div>

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
                                <a href="userlist.php"  class="active"><i class="fa fa-bar-chart-o fa-fw"></i>User List</a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="price.php"><i class="fa fa-table fa-fw"></i>Job List</a>
                            </li>
                            <li>
                                <a href="Totalsales.php"><i class="fa fa-edit fa-fw"></i>Sales</a>
                            </li>
                            <li>
                                <a href="Servicelist.php" ><i class="fa fa-wrench fa-fw"></i>Service List</span></a>
                           <!-- </li>
                            <li>
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
                            <h1 class="page-header">User List</h1>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>EMAIL</th>
                                        <th>PASS</th>
                                        <!-- <th>PFURI</th> -->
                                        <th>UID</th>
                                        <th>USERNAME</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../includes/dbconfig.php');
                                        $ref = 'users/';
                                        $fetchdata = $database->getReference($ref)->getValue();
                                        $i = 0;

                                      if($fetchdata > 0){ 
                                        foreach($fetchdata as $key => $row){
                                                $i++;
                                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <?php
                                                if(empty($row['email'])){
                                                    ?>
                                                    <td>Data Is Empty</td>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <td><?php echo $row['email']?></td>
                                                    <?php
                                                }
                                                ?>
                                        <?php
                                                if(empty($row['pass'])){
                                                    ?>
                                                    <td>Data Is Empty</td>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <td><?php echo $row['pass']?></td>
                                                    <?php
                                                }
                                                ?>
                                        
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
                                                ?>
                                        <?php
                                                if(empty($row['userName'])){
                                                    ?>
                                                    <td>Data Is Empty</td>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <td><?php echo $row['userName']?></td>
                                                    <?php
                                                }
                                                ?>
                                        <td>
                                            <a href="edit.php?token=<?php echo $key ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name = "ref_token_delete" value="<?php echo $key;?>">
                                                <button type="submit" name= "delete_data" class = "btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        }

                                    }

                                    else{
                                        ?>
                                        <tr>
                                            <td colspan="9">Data not available in firebase DB</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </div>
                        </div>
                    </div>
                
                </div>
            
            </div>
        </div>
    <!-- </div>
</div> -->
<?php include('footer.php'); ?>