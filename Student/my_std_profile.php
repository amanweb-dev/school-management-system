<!-- HEADER -->
<?php include "includes/header.php" ; ?>


<?php 

$view_id = Session::get('userId');
 $query = "SELECT * FROM student_info WHERE id = $view_id ";

$query_result = $db->select($query);
if ($query_result) {
  while ($rows = $query_result->fetch_assoc()) {
  $id=$rows['id'];
  $std_name=$rows['std_name'];
  $class=$rows['class'];
  $std_group=$rows['std_group'];
  $shift=$rows['shift'];
  $ftr_name=$rows['ftr_name'];
  $mtr_name=$rows['mtr_name'];
  $birth_date=$rows['birth_date'];
  $gender=$rows['gender'];
  $nationality=$rows['nationality'];
  $religion=$rows['religion'];
  $care_of=$rows['care_of'];
  $address=$rows['address'];
  $district=$rows['district'];
  $upazila=$rows['upazila'];
  $post_office=$rows['post_office'];
  $post_code=$rows['post_code'];
  $ftr_number=$rows['ftr_number'];
  $std_number=$rows['std_number'];
  $std_email=$rows['std_email'];
  $psc_xm_type=$rows['psc_xm_type'];
  $psc_board=$rows['psc_board'];
  $psc_roll=$rows['psc_roll'];
  $psc_passing_yr=$rows['psc_passing_yr'];
  $jsc_xm_type=$rows['jsc_xm_type'];
  $jsc_board=$rows['jsc_board'];
  $jsc_roll=$rows['jsc_roll'];
  $jsc_passing_yr=$rows['jsc_passing_yr'];
  $care_of=$rows['care_of'];
  $admission_date = $rows['admission_date'];
  $std_img = $rows['std_img'];
  $std_pass = $rows['std_pass'];

}
}


?>



<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-home"></i><a href="index.html">My Profile</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- Start Body -->
    <div class="row">
      <div class="col-md-4 col-xs-4"></div>
      <div class="col-md-4 col-xs-4">
        <img src="img/<?php echo $std_img; ?> " width="300px" height="250" alt="">
        <a href="edit_info.php?edit_pic=<?php echo $id; ?>"><button style="margin-top: 30px;margin-left: 90px;" class="btn btn-danger">Change PIcture</button></a>
      </div>
    </div>

  
<?php 

$view_id = Session::get('userId');

$crn_yr = date('Y');

 $query = "SELECT * FROM std_ecademic_info WHERE std_id = $view_id AND class_year = $crn_yr ";

$query_result = $db->select($query);
if ($query_result) {
  while ($rows = $query_result->fetch_assoc()) {
  $acc_id=$rows['id'];
  $current_class=$rows['current_class'];
  $current_sub=$rows['current_sub'];
  $current_result=$rows['current_result'];

  ?>

  </br>
  <hr>
  <hr>
  <h2 class="text-center">Accademic Info</h2>
  </br>

    <div class="row">
      <div class="col-md-12 col-xs-6">
        <div class="panel panel-info">
          <!-- <div class="panel-heading"><h2>Accademic Info</h2></div> -->
          <table class="table table-striped">
              <tbody>
                <tr class="table-info">
                  <th>Class</th>
                  <td><?php echo $current_class; ?></td>
                </tr> 

                <?php 
                    $pieces = explode(",", $current_sub);
                    $rr= count($pieces);
                    for ($i=0; $i < $rr; $i++) { ?>

                      <tr class="table-info">
                        <th>Subject :<?php echo " ".$i+1; ?></th>
                        <td><?php echo $pieces[$i]; ?></td>
                      </tr> 

                      
                   <?php }
                    
                    ?>
                      
                    
                </tbody>
          </table>
        </div>
      </div>
      
    </div>
 
  

<?php }
}


?>


  </br>
  <hr>
  <hr>
  <h2 class="text-center">Basic Info</h2>
  </br>

    <div class="row">
      <div class="col-md-12 col-xs-6">
        <div class="panel panel-info">
          <!-- <div class="panel-heading"><h2>Basic Info</h2></div> -->
          <table class="table table-striped">
              <tbody>
                <tr class="table-info">
                  <th>Name of the Group</th>
                  <td><?php echo $std_group; ?></td>
                  <th>Shift</th>
                  <td><?php echo $shift; ?></td>
                </tr>      
                <tr class="table-primary">
                  <th>Class</th>
                  <td><?php echo $class; ?></td>
                  <th>Student ID</th>
                  <td><?php echo $id; ?></td>
                </tr>
                <tr class="table-success">
                  <th>Applicant's Name</th>
                  <td><?php echo $std_name; ?></td>
                  <th>Father Name</th>
                  <td><?php echo $ftr_name; ?></td>
                </tr>


                <tr class="table-danger">
                  <th>Mother Name</th>
                  <td><?php echo $mtr_name; ?></td>
                   <th>Date of Birth</th>
                  <td><?php echo $birth_date; ?></td>
                </tr>
   
                  <tr class="table-warning">
                     <th>Applicant's Gender</th>
                     <td><?php echo $gender; ?></td>
                     <th>Nationality</th>
                     <td><?php echo $nationality; ?></td>
                  </tr>
                  <tr class="table-active">
                    <th>Religion</th>
                     <td><?php echo $religion; ?></td>
                     <th>Care of</th>
                     <td><?php echo $care_of; ?></td>
                  </tr>
                  <tr class="table-secondary">
                    <th>Village/Town/Road/House </th>
                     <td><?php echo $address; ?></td>
                    <th>District</th>
                    <td><?php echo $district; ?></td>
                  </tr>
                  <tr class="table-light">
                     <th>Upazila</th>
                    <td><?php echo $upazila; ?></td>
                    <th>Post Office</th>
                    <td><?php echo $post_office; ?></td>
                  </tr>
                  <tr class="table-dark text-dark">
                    <th>Post Code</th>
                    <td><?php echo $post_code; ?></td>
                    <th>Father Mobile Numbe</th>
                    <td><?php echo $ftr_number; ?></td>
                  </tr>
               
                  <tr>
                    <th>Personal Mobile Number</th>
                    <td><?php echo $std_number; ?></td>
                     <th>Email Address</th>
                    <td><?php echo $std_email; ?></td>
                  </tr>      
                  <tr class="table-primary">
                    <th>Examination Type</th>
                    <td><?php echo $psc_xm_type; ?></td>
                    <th>Board</th>
                    <td><?php echo $psc_board; ?></td>
                  </tr>

                  <tr class="table-success">
                    <th>PSC Roll</th>
                    <td><?php echo $psc_roll; ?></td>
                    <th>PSC Passing Year</th>
                    <td><?php echo $psc_passing_yr; ?></td>
                  </tr>
                  <tr class="table-danger">
                    <th>Examination Type</th>
                    <td><?php echo $jsc_xm_type; ?></td>
                    <th>Board</th>
                    <td><?php echo $jsc_board; ?></td>
                  </tr>
                  <tr class="table-info">
                     <th>Jsc Roll</th>
                    <td><?php echo $jsc_roll; ?></td>
                    <th>JSC Passing Year</th>
                    <td><?php echo $jsc_passing_yr; ?></td>

                  </tr>
                  <tr class="table-info">
                   <th>Addmission Date</th>
                    <td><?php echo $admission_date; ?></td>
                    <th><?php echo "Pass : ".$std_pass; ?> </th>
                    <td><a href="edit_info.php?edit_pass=<?php echo $id; ?>"><button  class="btn btn-danger">Change Password</button></a></td>
                  </tr>
                </tbody>
          </table>
        </div>
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