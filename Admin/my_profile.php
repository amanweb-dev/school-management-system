<!-- HEADER -->
<?php include "includes/header.php"; ?>

 <?php 
      if (isset($_POST['submit'])) {
          $name = mysqli_real_escape_string($db->link,$_POST['admin_name']);
         


          ///image file query
                $admin_img = $_FILES['img']['name'];
                $extension = strtolower(substr($admin_img,strlen($admin_img)-4,strlen($admin_img)));
                $allowed_extensions = array(".jpg","jpeg",".png",".gif");
                if(in_array($extension,$allowed_extensions)){

                $destination = "img/Admin_imgs/".$admin_img;  
                $file = $_FILES['img']['tmp_name'];
                move_uploaded_file($file, $destination);                    
          ///ending image file query


          if (!empty($name) && !empty($file)) {
             $query = "UPDATE admin SET admin_name= '{$name}',admin_img='{$admin_img}' ";
              $insert_query_rslt = $db->update($query);
              if ($insert_query_rslt) {
                  echo "<p style='color:green;text-align:center;'>Information has been saved</p>";
              }else{
                   echo "<p style='color:red;text-align:center;'>opps!! something is wrong</p>";
              }

          }else{
              echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
          }

      }else{
        echo "<p style='color:red;text-align:center;'>image type must be (.jpg, jpeg, .png, .gif)</p>"; 
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
          <li><i class="fa fa-laptop"></i>Admin</li>
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
              <h1>Admin Information Here</h1>
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
             <form action="my_profile.php" method="post" enctype="multipart/form-data">
               <label for="">Admin Name<span>*</span>&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&emsp;</label>
               <input class="input-width" type="text" name="admin_name" required="">
               
               <label for="">Admin Photo <span>*</span>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
               <input type="file" class="input-width" name="img"><br><br>
               <input type="submit" name="submit" class="btn btn-primary btn-primary1" value="Save">
             </form>
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