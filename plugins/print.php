<?php include('header.php'); ?>
<?php session_start(); ?>
<?php
    $ID = $_GET['token'];
    include('../includes/dbconfig.php');
    $ref = 'users/'.$ID;
    $getdata = $database->getreference($ref)->getValue();
    $Username = $getdata['userName'];
    $Fullname = $getdata['fullName'];
    $contactnum = $getdata['contactNum'];
    $Email = $getdata['email'];

?>
<div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    
                                </td>
                                
                                <td>
                                <b>uID #: </b><?php echo "\t".$ID?> <br>
                                <b>Created: </b><?php echo "\t".date("Y/m/d")?> <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    
                                </td>
                                
                                <td> <b>Contact #:</b><?php echo "\t".$contactnum ;?><br>
                                <b>Username:</b><?php echo "\t".$Username;?><br>
                                <b>Email:</b><?php echo "\t".$Email;?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Job Detail
                    </td>
                    
                    <td>
                        
                    </td>
                </tr>

                    <?php 
                        $refcount = 'users/'.$ID.'/service';
                        $count = $database->getReference($refcount)->getSnapshot()->numChildren();
                        for($z =  1; $z <= $count; $z++){
                            ?>
                            <tr class="item">
                    
                                <td>
                                   <b> Job<?php echo $z?></b>
                                </td>
                                
                                <td>
                                 
                                </td>
                            </tr>
                            
                                <?php
                                    $holder = '/s'.$z;
                                    $ref2nd = "users/".$ID.'/service'.$holder;
                                    $childtest =$database->getreference($ref2nd)->getsnapshot()->numchildren();
                                    $getvalue = $database->getreference($ref2nd)->getValue();
                                    $reftry2 = "users/".$ID."/value/v".$z;

                                    $serv1val = "users/".$ID."/value/v".$z."/service1/service1";
                                    $getval1 = $database->getreference($serv1val)->getvalue();

                                    $serv2val = "users/".$ID."/value/v".$z."/service2/service2";
                                    $getval2 = $database->getreference($serv2val)->getvalue();

                                    $serv3val = "users/".$ID."/value/v".$z."/service3/service3";
                                    $getval3 = $database->getreference($serv3val)->getvalue();

                                    $serv4val = "users/".$ID."/value/v".$z."/service4/service4";
                                    $getval4 = $database->getreference($serv4val)->getvalue();

                                    $serv5val = "users/".$ID."/value/v".$z."/service5/service5";
                                    $getval5 = $database->getreference($serv5val)->getvalue();
                                    
                                    $totalperJob = 0;
                                    $getval1 = $database->getreference($serv1val)->getvalue();
                                    $childvalue = $database->getreference($reftry2)->getsnapshot()->numchildren();
                                    $getnum = $database->getreference($reftry2)->getvalue();
                                    foreach($getvalue as $key){
                                        
                                       ?>
                                        <tr>
                                            <td> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $key;?></td>
                                            
                                            <?php

                                               if($key == 'Full Check Up'){
                                                    ?>
                                                        <td><?php echo $getval1 ?></td>
                                                    <?php
                                                    $float1 = floatval($getval1);
                                                    $totalperJob += $float1;
                                   
                                               }
                                               if($key == 'Tire Change up'){
                                                    ?>
                                                        <td><?php echo $getval2 ?></td>
                                                    <?php
                                                    $float1 = floatval($getval2);
                                                    $totalperJob += $float1;
                                               }
                                               if($key == 'Engine Check up'){
                                                    ?>
                                                        <td><?php echo $getval3 ?></td>
                                                    <?php
                                                    $float1 = floatval($getval3);
                                                    $totalperJob += $float1;
                                               }
                                               if($key == 'Paint Job'){
                                                    ?>
                                                        <td><?php echo $getval4 ?></td>
                                                    <?php
                                                    $float1 = floatval($getval4);
                                                    $totalperJob += $float1;
                                               }
                                               if($key == 'Change Oil'){
                                                    ?>
                                                        <td><?php echo $getval5 ?></td>
                                                    <?php
                                                    $float1 = floatval($getval5);
                                                    $totalperJob += $float1;
                                               }
                                    }
                                            ?>  
                                            
                                       </tr>
                                       <tr>
                                            <td>
                                                Total:
                                            </td>
                                            <td>
                                                <b><?php echo $totalperJob?></b>
                                            </td>
                                       </tr>
                                        <?php
                        }
                    ?>
                        
            </table>
            </div>
        <div class="print">
            <button onclick="myFunction()">Print this page</button>
        </div>
        <div class="print">
            <button>Save To Pdf</button>
        </div>
<script>
function myFunction() {
    window.print();
}
</script>
</div>
<?php include('footer.php'); ?>
