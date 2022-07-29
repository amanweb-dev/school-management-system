<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
          <li><i class="fa fa-home"></i><a href="index.php">Form</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- Start Body -->


<?php 
    if (isset($_GET['view'])) {

      $id = $_GET['view'];
      $query = "SELECT * FROM student_info WHERE id = $id ";
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

                        ?>

      <div class="border">
       <div class="header-area">
         <div class="container">
           <div class="row">
             <div class="col">
               <div class="header-title">
                 <h1>Harimohan Goverment High School</h1>
               </div>
             </div>
           </div>
         </div>
       </div>
     <div class="logo-area">
       <div class="container">
         <div class="row">
           <div class="col-md-3">
             <div class="logo">
              <a href=""><img src="img/logo.jpg" alt=""></a>
            </div>
          </div>
          <div class="col-md-6">
           <div class="adress">
             <p>Kathal Bagicha, Chapainawabganj sadar. <br>Chapainawabganj, Bangladesh.</p>
             <p>Phone:+88 0781 52435</p>
             <p>Website:Hairmohan.com</p>
             <p>Email:harimahan@gmail.com</p>
           </div>
         </div>
         <div class="col-md-3">
           <div class="std-pic">
             <p>Student Picture</p>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="header-width">
     <div class="container">
       <div class="row">
         <div class="col">
           <div class="header-title1">
             <h1>Application for Admission</h1>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="form-area">
     <div class="container">
       <div class="row">
         <div class="col">
           <div class="admission-form">

            <table class="table">
              <tbody>
                <tr class="table-info">
                  <th>Name of the Group</th>
                  <td><?php echo $std_group; ?></td>
                  <th>Shift</th>
                  <td><?php echo $shift; ?></td>
                  <th>Class</th>
                  <td><?php echo $class; ?></td>
                </tr>      
                <tr class="table-primary">
                  <th>Student ID</th>
                  <td><?php echo $id; ?></td>
                  <th>Applicant's Name</th>
                  <td><?php echo $std_name; ?></td>
                  <th>Father Name</th>
                  <td><?php echo $ftr_name; ?></td>
                </tr>
                <tr class="table-success">
                  <th>Mother Name</th>
                  <td><?php echo $mtr_name; ?></td>
                   <th>Date of Birth</th>
                  <td><?php echo $birth_date; ?></td>
                  <th>Applicant's Gender</th>
                  <td><?php echo $gender; ?></td>
                </tr>
                <tr class="table-danger">
                 <th>Nationality</th>
                  <td><?php echo $nationality; ?></td>
                  <th>Religion</th>
                  <td><?php echo $religion; ?></td>
                </tr>
              </tbody>
            </table>
               
               <p class="add-bg">Mailing/Present Address</p>

               <table class="table">
                <tbody>
                  <tr class="table-warning">
                     <th>Care of</th>
                     <td><?php echo $care_of; ?></td>
                     <th>Village/Town/Road/House </th>
                     <td><?php echo $address; ?></td>
                  </tr>
                  <tr class="table-active">
                    <th>District</th>
                    <td><?php echo $district; ?></td>
                    <th>Upazila</th>
                    <td><?php echo $upazila; ?></td>
                  </tr>
                  <tr class="table-secondary">
                    <th>Post Office</th>
                    <td><?php echo $post_office; ?></td>
                    <th>Post Code</th>
                    <td><?php echo $post_code; ?></td>
                  </tr>
                  <tr class="table-light">
                    <th>Father Mobile Numbe</th>
                    <td><?php echo $ftr_number; ?></td>
                    <th>Personal Mobile Number</th>
                    <td><?php echo $std_number; ?></td>
                  </tr>
                  <tr class="table-dark text-dark">
                     <th>Email Address</th>
                    <td><?php echo $std_email; ?></td>
                  </tr>
                </tbody>
              </table>

               <p class="add-bg">PSC or Equivalent Academic Qualifications</p>

               <table class="table">
                <tbody>
                  <tr>
                    <th>Examination Type</th>
                    <td><?php echo $psc_xm_type; ?></td>
                    <th>Board</th>
                    <td><?php echo $psc_board; ?></td>
                  </tr>      
                  <tr class="table-primary">
                    <th>Roll</th>
                    <td><?php echo $psc_roll; ?></td>
                    <th>Passing Year</th>
                    <td><?php echo $psc_passing_yr; ?></td>
                  </tr>
                </tbody>
              </table>
               
               <p class="add-bg">JSC or Equivalent Academic Qualifications</p>

              <table class="table">
                <tbody>
                  <tr class="table-success">
                    <th>Examination Type</th>
                    <td><?php echo $jsc_xm_type; ?></td>
                    <th>Board</th>
                    <td><?php echo $jsc_board; ?></td>
                  </tr>
                  <tr class="table-danger">
                    <th>Roll</th>
                    <td><?php echo $jsc_roll; ?></td>
                    <th>Passing Year</th>
                    <td><?php echo $jsc_passing_yr; ?></td>
                  </tr>
                  <tr class="table-info">
                   <th>Addmission Date</th>
                    <td><?php echo $admission_date; ?></td>
                  </tr>
                </tbody>
              </table>

              <div class="row" style="margin-top: 30px;">
                <div class="col-md-8"><h3>Authority Signature</h3></div>
                <div class="col-md-4"><h3>Student Signature</h3></div>
              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

 <a href="student_info.php"><button class="btn btn-success">Back</button></a>





                        <?php

                        }
                      }

        }


?> 

    
</section>
<div class="text-center">
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">Creative Coder</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->


<!-- FOOTER --> 
<?php include "includes/footer.php"; ?> 
