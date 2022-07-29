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

    <!-- Start Body -->
    <div class="border">
     <div class="header-width">
       <div class="container">
         <div class="row">
           <div class="col">
             <div class="header-title1">
              <h1>Edit Settings</h1>
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
    if (isset($_POST['update_pic'])) {
        
$view_id = Session::get('userId');
       
        ///image file query
              $img = $_FILES['img']['name'];
              $extension = strtolower(substr($img,strlen($img)-4,strlen($img)));
              $allowed_extensions = array(".jpg","jpeg",".png",".gif");
              if(in_array($extension,$allowed_extensions)){

              $destination = "img/".$img;
              $file = $_FILES['img']['tmp_name'];
              move_uploaded_file($file, $destination);                    
        ///ending image file query


        if (!empty($img)) { 
             $query = "UPDATE student_info SET std_img = '$img' WHERE id = $view_id ";
              $update_post = $db->update($query);
              if ($update_post) {
                  echo "<p style='color:green;text-align:center;'>Photo updated Successfully</p>";
              }else{
                   echo "<p style='color:red;text-align:center;'>opps!! Photo is not updated</p>";
              }

          }else{
              echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
          }

}else{
echo "<p style='color:red;text-align:center;'>file type must be (.img)</p>"; 
}

}

?>




<?php 
    if (isset($_POST['update_pass'])) {
        
$view_id = Session::get('userId');
       
        $new_pass = mysqli_real_escape_string($db->link,$_POST['new_pass']);


        if (!empty($new_pass)) { 
             $query = "UPDATE student_info SET std_pass = '$new_pass' WHERE id = $view_id ";
              $update_post = $db->update($query);
              if ($update_post) {
                  echo "<p style='color:green;text-align:center;'>Password updated Successfully</p>";
              }else{
                   echo "<p style='color:red;text-align:center;'>opps!! Password is not updated</p>";
              }

          }else{
              echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
          }

}

?>










            <?php 
            if (isset($_GET['edit_pic'])) { ?>

               <form action="edit_info.php" method="post" enctype="multipart/form-data">

               <label for="">Event Photo <span>*</span>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
              
               <input type="file" class="input-width" name="img"><br><br>
                
               <input type="submit" name="update_pic" value="SUBMIT" class="btn btn-primary btn-primary1">
             </form>


           <?php }else if(isset($_GET['edit_pass'])){ ?>

            <form action="edit_info.php" method="post" enctype="multipart/form-data">
               <label for="">New Password<span>*</span>&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&emsp;</label>
               <input class="input-width" name="new_pass" type="text" required="">
                
               <input type="submit" name="update_pass" value="SUBMIT" class="btn btn-primary btn-primary1">
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