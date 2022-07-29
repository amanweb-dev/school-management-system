<!-- HEADER -->
<?php include "includes/header.php" ; ?> 


<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-home"></i><a href="index.html">My Class</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>

    
    <!-- Start Body -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3>Here is your class lists</h3></div>
      <div class="table-responsive-md">
              <table class="table table-bordered text-center">
                  <tr>
                      <th>Day/Time</th>
                      <th>08:00 AM to 09:00 AM</th>
                      <th>09:00 AM to 10:00 AM</th>
                      <th>10:00 AM to 11:00 AM</th>
                      <th>11:00 AM to 12:00 PM</th>
                      <th>01:00 PM to 02:00 PM</th>
                      <th>02:00 PM to 03:00 PM</th>
                      <th>03:00 PM to 04:00 PM</th>
                      <th>04:00 PM to 05:00 PM</th>
  
                  </tr>
                  
                      <?php


                   $userId = Session::get('userId');

                   $yr = date('Y');


                        $day_arr =array("Saturday","Sunday","Monday","Tuesday","Wednesday","Thusday");

                        for ($k=0; $k<6 ; $k++) { ?>
                          <tr>
                      <th><?php echo $day_arr[$k]; ?></th>

                         <?php $query = "SELECT * FROM routine WHERE tchr_id = '$userId' AND days = '$day_arr[$k]' ";
$query_result = $db->select($query);
                      $i=0;
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                          $cls_time[$i] = $rows['cls_time'];
                          $tchr_id[$i]=$rows['tchr_id'];
                          $class[$i]=$rows['class'];
                          $subject[$i]=$rows['subject'];
                          $days[$i]=$rows['days'];
                          $i++;


                      }

                         $num = count($cls_time);
                         $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='8_9' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }





                       $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='9_10' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                           // continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }else{
                        $check==2;
                       }



                        $check = 2;
                        $j=0;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='10_11' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }



                       $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='11_12' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }




                       $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='1_2' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }


                       $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='2_3' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }



                        $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='3_4' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }



                        $check = 2;
                         for ($j=0; $j <$num ; $j++) { 
                           if ($cls_time[$j]=='4_5' && $day_arr[$k] == $days[$j]) { 
                            $check = 2;
                            ?>

                            <td class="link"><a href=""><?php echo $subject[$j]; ?> <br><?php echo $tchr_id[$j]; ?> <br><?php echo $class[$j]; ?></a></td>
                            <?php break; ?>
                             
                          <?php }else{
                            $check = 3;
                            //continue;
                          }
                         }
                         if ($check==3) {?>

                          <td class="link"><a href=""><br><br></a></td>
                           
                       <?php  }
                        
                        
                      

                     }
                          
                        }
                        echo "</tr>";
                      
                  

                       ?>

                  
              </table>
            </div>
   </div>
 </section>
 <div class="text-center">
  <div class="credits">
    
    Designed by <a href="#">Drop Out Dev</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->
 
  <!-- FOOTER -->
<?php include "includes/footer.php"; ?> 