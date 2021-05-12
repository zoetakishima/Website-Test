<?php include('header.php'); ?>

<!-- <div class="container">
    <div class="col-md-12 mt-5"> -->
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
                                <a href="Servicelist.php" ><i class="fa fa-wrench fa-fw"></i>Service List</span></a>
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
                            <h1 class="page-header">Job List</h1>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                    <th>Services</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                <?php
                                    include('../includes/dbconfig.php');
                                    $ref = 'users/';
                                    $fetchdata = $database->getReference($ref)->getValue();

                                      foreach($fetchdata as $key => $row){
                                          $id = $row['uid'];
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
                                                ?>

                                            <?php
                                                if(empty($row['fullName'])){
                                                    ?>
                                                    <td>Data Is Empty</td>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <td><?php echo $row['fullName']?></td>
                                                    <?php
                                                }
                                                ?>
                              
                                            <?php
                                                if(empty($row['contactNum'])){
                                                    ?>
                                                    <td>Data Is Empty</td>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <td><?php echo $row['contactNum']?></td>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if(empty($row['service'])){
                                                    ?>
                                                    <td>Data Is Empty</td>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <?php
                                                    $refkey = 'users/'.$key.'/service';

                                                    $childNum = $database->getReference($refkey)->getSnapshot()->numChildren();
                                                    $fetchservice = $database->getReference($refkey)->getValue();
                                                        $i = 0; 
                                                        ?>
                                                         <?php
                                                            for($i=1 ; $i<= $childNum ; $i++){
                                                                ?>
                                                                        
                                                                        <td>Job <?php echo $i?> </td>
                                                                    
                                                            <?php
                                                            }       
                                                    
                                                }
                                                ?>
                                                <td>
                                                    <a href="value.php?token=<?php echo $id?>" class="btn btn-primary">EnterValue</a>
                                                </td>
                                         <?php
                                      }
                                    ?>
                                
                            </tr>
                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    <!-- </div>
</div> -->

<?php include('footer.php'); ?>