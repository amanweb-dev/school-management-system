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
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>


<?php 
$visible = 0;
    if (isset($_POST['submit'])) {
       $u_name = mysqli_real_escape_string($db->link,$_POST['u_name']);
       $u_passes = mysqli_real_escape_string($db->link,$_POST['u_pass']);
       $u_email = mysqli_real_escape_string($db->link,$_POST['u_email']);
       $gender = mysqli_real_escape_string($db->link,$_POST['gender']);
       $u_address = mysqli_real_escape_string($db->link,$_POST['u_address']);
       $u_contact = mysqli_real_escape_string($db->link,$_POST['u_contact']);
        $u_pass= md5($u_passes);
       
       
        
        ///image file query
            $file = $_FILES['file']['name'];
              $extension = strtolower(substr($file,strlen($file)-4,strlen($file)));
              $allowed_extensions = array(".jpg","jpeg",".png",".gif");
              if(in_array($extension,$allowed_extensions)){

              $destination = "img/".$file;  
              $files = $_FILES['file']['tmp_name'];
              move_uploaded_file($files, $destination);                    
        ///ending image file query


        if (!empty($u_name) && !empty($u_pass) && !empty($u_email) && !empty($gender) && !empty($u_address) && !empty($u_contact) && !empty($file) ) {
           $query = "INSERT INTO admission_admin(u_name,u_pass,u_email,gender,u_address,u_contact,u_img) VALUES('{$u_name}','{$u_pass}','{$u_email}','{$gender}','{$u_address}','{$u_contact}','{$file}') ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
              $visible = 1;
                echo "<p style='color:green;text-align:center;'>Admission Admin created successfully</p>";
                ?>
                <div id="printableArea">
            <h2> Details</h2>
             <table class="table">
              <thead>
                <tr>
                  <th>User Name:</th>
                  <td><?php echo $u_name; ?></td>
                </tr>

                <tr>
                  <th>Password:</th>
                  <td><?php echo $u_passes; ?></td>
                </tr>

                <tr>
                  <th>mail:</th>
                  <td><?php echo $u_email; ?></td>
                </tr>

                <tr>
                  <th>gender:</th>
                  <td><?php echo $gender; ?></td>
                </tr>

                 <tr>
                  <th>Address:</th>
                  <td><?php echo $u_address; ?></td>
                </tr>

                <tr>
                  <th>Contact No:</th>
                  <td><?php echo $u_contact; ?></td>
                </tr>

              </thead>
        
            </table>
            
          </div>
          <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Details" />
          <a href="Addmission_login.php"><button class="btn btn-success">Back</button></a>
          <?php
            }else{
                 echo "<p style='color:red;text-align:center;'>opps!! Admission Admin is not created</p>";
            }

        }else{
            echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
        }

    }else{
      echo "<p style='color:red;text-align:center;'>file type must be (.jpg)</p>"; 
    }

}

?>

<?php 
if ($visible == 0) { ?>

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
              <form action="Addmission_login.php" method="post" enctype="multipart/form-data">
                 <label for="">User Name <span>*</span>&nbsp;&nbsp;:&emsp;&emsp;&emsp;</label>
                 <input class="input-width" type="text" name="u_name" required="">
                 <label for="">User Password <span>*</span>&nbsp;&nbsp;:&emsp;&emsp;</label>
                 <input class="input-width" type="password" name="u_pass" required="">
                 <label for="">Email Address&emsp;&emsp;:&emsp;</label>
                 <input class="input-width" type="email" name="u_email" required=""><br>
                 <label for="">Applicant's Gender <span>*</span>:&emsp;</label>
                 <input type="checkbox" name="gender" value="Male">
                 <label for="">&nbsp;&nbsp;Male&nbsp;&nbsp;</label>
                 <input type="checkbox" name="gender" value="Female">
                 <label for="">&nbsp;&nbsp;Female&nbsp;&nbsp;</label>
                 <input type="checkbox" name="gender" value="Other">
                 <label for="">&nbsp;&nbsp;Other</label><br>
                 <label for="">Village/Town/<br>Road/House <span>*</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;</label>
                 <textarea name="u_address" id="" cols="30" rows="5"></textarea><br><br>
                 <label for="">Contact Number <span>*</span>&nbsp;&nbsp;:&emsp;</label>
                 <input class="address" type="text" name="u_contact" required="">&emsp;&emsp;&emsp;
                 <label for="">User Photo <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                 <input type="file" name="file"><br><br>
                 <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary btn-primary1">
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

 
<?php }

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