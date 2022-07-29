<!-- HEADER -->
<?php include "includes/header.php"; ?>

<?php 
$visible = 0;
if (isset($_GET['edit'])) {
  $edit_id = $_GET['edit'];
  $query = "SELECT * FROM admission_admin WHERE a_a_id = $edit_id";
  $query_result = $db->select($query);
  while ($rows = $query_result->fetch_assoc()) {
    $a_a_id=$rows['a_a_id'];
    $u_name=$rows['u_name'];
    //$u_pass=$rows['u_pass'];
    $u_email=$rows['u_email'];
    $gender=$rows['gender'];
    $u_address=$rows['u_address'];
    $u_contact=$rows['u_contact'];
    $u_img=$rows['u_img'];

                        
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
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>

    <!-- Start Body -->
    <div class="border">
     <div class="header-width">
       <div class="container">
         <div class="row">
           <div class="col">
             <div class="header-title1 header-title2">
               <h1>Addmission Panel User Information Input Here</h1>
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

              <?php 
                if (isset($_POST['update'])) {
                    $u_name_up = mysqli_real_escape_string($db->link,$_POST['u_name']);
                   $u_pass_ups = mysqli_real_escape_string($db->link,$_POST['u_pass']);
                   $u_email_up = mysqli_real_escape_string($db->link,$_POST['u_email']);
                   $gender_up = mysqli_real_escape_string($db->link,$_POST['gender']);
                   $u_address_up = mysqli_real_escape_string($db->link,$_POST['u_address']);
                   $u_contact_up = mysqli_real_escape_string($db->link,$_POST['u_contact']);
                  $u_pass_up= md5($u_pass_ups);

                  $a_a_id_up =mysqli_real_escape_string($db->link,$_POST['a_a_id']);
                   
                     ///image file query
                        $file = $_FILES['file']['name'];
                          $extension = strtolower(substr($file,strlen($file)-4,strlen($file)));
                          $allowed_extensions = array(".jpg","jpeg",".png",".gif");
                          if(in_array($extension,$allowed_extensions)){

                          $destination = "img/".$file;  
                          $files = $_FILES['file']['tmp_name'];
                          move_uploaded_file($files, $destination);                    
                    ///ending image file query


                    if (!empty($u_name_up) && !empty($u_pass_up) && !empty($u_email_up) && !empty($gender_up) && !empty($u_address_up) && !empty($u_contact_up) && !empty($file)) { 
                                   $query = "UPDATE admission_admin SET u_name = '$u_name_up',u_pass='$u_pass_up',u_email='$u_email_up',gender='$gender_up',u_address='$u_address_up',u_contact='$u_contact_up',u_img='$file' WHERE a_a_id =  $a_a_id_up ";
                                    $update_post = $db->update($query);
                                    if ($update_post) {
                                      $visible = 1;
                                        echo "<p style='color:green;text-align:center;'>Notice updated Successfully</p>";

                                        ?>
                                          <div id="printableArea">
                                      <h2> Details</h2>
                                       <table class="table">
                                        <thead>
                                          <tr>
                                            <th>User Name:</th>
                                            <td><?php echo $u_name_up; ?></td>
                                          </tr>

                                          <tr>
                                            <th>Password:</th>
                                            <td><?php echo $u_pass_ups; ?></td>
                                          </tr>

                                          <tr>
                                            <th>mail:</th>
                                            <td><?php echo $u_email_up; ?></td>
                                          </tr>

                                          <tr>
                                            <th>gender:</th>
                                            <td><?php echo $gender_up; ?></td>
                                          </tr>

                                           <tr>
                                            <th>Address:</th>
                                            <td><?php echo $u_address_up; ?></td>
                                          </tr>

                                          <tr>
                                            <th>Contact No:</th>
                                            <td><?php echo $u_contact_up; ?></td>
                                          </tr>

                                        </thead>
                                  
                                      </table>
                                      
                                    </div>
                                    <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Details" />
                                    <a href="Addmission_details.php"><button class="btn btn-success">Back</button></a>
                                    <?php




                                    }else{
                                         echo "<p style='color:red;text-align:center;'>opps!! notice is not updated</p>";
                                    }

                                }else{
                                    echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
                                }

                }else{
                  echo "<p style='color:red;text-align:center;'>file type must be (.pdf)</p>"; 
                }

            }

            if ($visible==0) { ?>
              
              <form action="edit_addmission.php" method="post" enctype="multipart/form-data">
                 <label for="">User Name <span>*</span>&nbsp;&nbsp;:&emsp;&emsp;&emsp;</label>
                 <input class="input-width" type="text" name="u_name" value="<?php echo (isset($_GET['edit']))?$u_name: " "; ?> " required="">
                 <label for="">User Password <span>*</span>&nbsp;&nbsp;:&emsp;&emsp;</label>
                 <input class="input-width" type="text" name="u_pass" value="<?php echo (isset($_GET['edit']))?"1234": ""; ?> " required="">
                 <label for="">Email Address&emsp;&emsp;:&emsp;</label>
                 <input class="input-width" type="email" name="u_email"  value="<?php echo (isset($_GET['edit']))?$u_email: " "; ?> " required=""><br>
                 <label for="">Applicant's Gender <span>*</span>:&emsp;</label>
                 <input type="checkbox" name="gender" value="Male">
                 <label for="">&nbsp;&nbsp;Male&nbsp;&nbsp;</label>
                 <input type="checkbox" name="gender" value="Female">
                 <label for="">&nbsp;&nbsp;Female&nbsp;&nbsp;</label>
                 <input type="checkbox" name="gender" value="Other">
                 <label for="">&nbsp;&nbsp;Other</label><br>
                 <label for="">Village/Town/<br>Road/House <span>*</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;</label>
                 <textarea name="u_address" id="" cols="30" rows="5"><?php echo (isset($_GET['edit']))?$u_address: " "; ?></textarea><br><br>
                 <label for="">Contact Number <span>*</span>&nbsp;&nbsp;:&emsp;</label>
                 <input class="address" type="text" name="u_contact" value="<?php echo (isset($_GET['edit']))?$u_contact: " "; ?> " required="">&emsp;&emsp;&emsp;
                 

                 <?php 
                 if (isset($_GET['edit'])) { ?>
                  <label for="">User saved Photo <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                   <img width="100" height="100" src="img/<?php echo $u_img; ?> " alt=""></br></br>
                <?php }

                  ?>
                 

                 <label for="">User Photo <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                 <input type="file" name="file"><br><br>
                  <input type="hidden" name="a_a_id" value="<?php echo $a_a_id; ?> ">

                 <input type="submit" name="update" value="Update" class="btn btn-primary btn-primary1">
               </form>
           

           <?php }

            ?>


              
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
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

<!-- FOOTER  -->

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