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
    if (isset($_POST['submit'])) {
        $std_group = mysqli_real_escape_string($db->link,$_POST['std_group']);
        $shift = mysqli_real_escape_string($db->link,$_POST['shift']);
        $class = mysqli_real_escape_string($db->link,$_POST['class']);
        $std_name = mysqli_real_escape_string($db->link,$_POST['std_name']);
        $ftr_name = mysqli_real_escape_string($db->link,$_POST['ftr_name']);
        $mtr_name = mysqli_real_escape_string($db->link,$_POST['mtr_name']);
        $birth_date = mysqli_real_escape_string($db->link,$_POST['birth_date']);
        $gender = mysqli_real_escape_string($db->link,$_POST['gender']);
        $nationality = mysqli_real_escape_string($db->link,$_POST['nationality']);
        $religion = mysqli_real_escape_string($db->link,$_POST['religion']);
        $care_of = mysqli_real_escape_string($db->link,$_POST['care_of']);
        $address = mysqli_real_escape_string($db->link,$_POST['address']);
        $district = mysqli_real_escape_string($db->link,$_POST['district']);
        $upazila = mysqli_real_escape_string($db->link,$_POST['upazila']);
        $post_office = mysqli_real_escape_string($db->link,$_POST['post_office']);
        $post_code = mysqli_real_escape_string($db->link,$_POST['post_code']);
        $ftr_number = mysqli_real_escape_string($db->link,$_POST['ftr_number']);
        $std_number = mysqli_real_escape_string($db->link,$_POST['std_number']);
        $std_email = mysqli_real_escape_string($db->link,$_POST['std_email']);
        $psc_xm_type = mysqli_real_escape_string($db->link,$_POST['psc_xm_type']);
        $psc_board = mysqli_real_escape_string($db->link,$_POST['psc_board']);
        $psc_roll = mysqli_real_escape_string($db->link,$_POST['psc_roll']);
    $psc_passing_yr = mysqli_real_escape_string($db->link,$_POST['psc_passing_yr']);
        $jsc_xm_type = mysqli_real_escape_string($db->link,$_POST['jsc_xm_type']);
        $jsc_board = mysqli_real_escape_string($db->link,$_POST['jsc_board']);
        $jsc_roll = mysqli_real_escape_string($db->link,$_POST['jsc_roll']);
        $jsc_passing_yr = mysqli_real_escape_string($db->link,$_POST['jsc_passing_yr']);
        $care_of = mysqli_real_escape_string($db->link,$_POST['care_of']);


        $year = date('y');
          $education_year = $year.($year + 1);

          $query = "SELECT * FROM student_info ORDER BY id DESC LIMIT 1";
           $result = $db->select($query);
           if (!$result) {
             $id = $education_year.'00001';
           }else{

            while($row = mysqli_fetch_assoc($result)) {
              $id = intval($row['id']) + 1;
           }
          
          }

          
          $admission_date = date('d-m-y');
          $std_pass = rand();      
       

        if (!empty($std_group) && !empty($shift) && !empty($std_name) && !empty($ftr_number)) {
           $query = "INSERT INTO student_info(id,std_group,
shift,class,std_name,ftr_name,mtr_name,birth_date,gender,nationality,religion,care_of,address,district,upazila,post_office,post_code,ftr_number,std_number,std_email,psc_xm_type,psc_board,psc_roll,psc_passing_yr,jsc_xm_type,jsc_board,jsc_roll,jsc_passing_yr,admission_date,std_pass) VALUES({$id},'{$std_group}','{$shift}','{$class}','{$std_name}','{$ftr_name}','{$mtr_name}','{$birth_date}','{$gender}','{$nationality}','{$religion}','{$care_of}','{$address}','{$district}','{$upazila}','{$post_office}','{$post_code}','{$ftr_number}','{$std_number}','{$std_email}','{$psc_xm_type}','{$psc_board}','{$psc_roll}','{$psc_passing_yr}','{$jsc_xm_type}','{$jsc_board}','{$jsc_roll}','{$jsc_passing_yr}','{$admission_date}','{$std_pass}') ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<p style='color:green;text-align:center;'>Student created successfully</p>";

                  ?>
      <div id="printableArea">
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
                    <th>Password</th>
                    <td><?php echo $std_pass; ?></td>
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
 </div>

 <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Details" />
 <a href="form.php"><button class="btn btn-success">Back</button></a>





              <?php

            }else{
                 echo "<p style='color:red;text-align:center;'>opps!! event is not created</p>";
            }

        }else{
            echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
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
<script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>