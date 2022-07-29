<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
if (isset($_GET['edit'])) {
  $notice_id = $_GET['edit'];
  $query = "SELECT * FROM notice WHERE notice_id = $notice_id";
  $query_result = $db->select($query);
  while ($rows = $query_result->fetch_assoc()) {
    $notice_id=$rows['notice_id'];
    $notice_title=$rows['notice_title'];
    $notice_date=$rows['notice_date'];
    $notice_pdf=$rows['notice_pdf'];

                        
}

}



 ?>

<?php 
    if (isset($_POST['update'])) {
        $notice_title = mysqli_real_escape_string($db->link,$_POST['notice_title']);
        $notice_date =  $_POST['notice_date'];
        $nots_id =  $_POST['nots_id'];
       
        ///image file query
              $notice_file = $_FILES['notice_file']['name'];
              $extension = strtolower(substr($notice_file,strlen($notice_file)-4,strlen($notice_file)));
              $allowed_extensions = array(".pdf");
              if(in_array($extension,$allowed_extensions)){

              $destination = "pdf_file/".$notice_file;  
              $file = $_FILES['notice_file']['tmp_name'];
              move_uploaded_file($file, $destination);                    
        ///ending image file query


        if (!empty($notice_title) && !empty($notice_date) && !empty($notice_file)) { 
                       $query = "UPDATE notice SET notice_title = '$notice_title',notice_date='$notice_date',notice_pdf='$notice_file' WHERE notice_id =  $nots_id ";
                        $update_post = $db->update($query);
                        if ($update_post) {
                            echo "<p style='color:green;text-align:center;'>Notice updated Successfully</p>";
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
             <div class="header-title1">
               <h1>Notice Infromation Input Here</h1>
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
               <form action="edit_notice.php" method="post" enctype="multipart/form-data">
                 <label for="">Notice Tittle <span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input class="input-width" value="<?php echo (isset($_GET['edit']))?$notice_title: " "; ?> " name="notice_title" type="text" required="">

                 <label for="">Notice Previous Date:<span>*</span>&nbsp;&nbsp;&nbsp;&emsp;:&emsp;</label> <?php echo (isset($_GET['edit']))?$notice_date:" "; ?><br><br>
                 
                 <label for="">Today Date <span>*</span>&nbsp;&nbsp;&nbsp;&emsp;:&emsp;</label>
                 <input class="address" type="date" name="notice_date" required="">&emsp;&emsp;&nbsp;
                 </br><label for="">Notice PDF File Previous <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label><?php echo (isset($_GET['edit']))?$notice_pdf:" "; ?><br><br>
                 
                 <label for="">Notice PDF File <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                 <input type="file" name="notice_file"><br><br>
                 <input type="hidden" name="nots_id" value="<?php echo $notice_id; ?> ">
                 <input type="submit" name="update" class="btn btn-primary btn-primary1" value="Update">

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
    Designed by <a href="#">Creative Coder</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- FOOTER  -->
<?php include "includes/footer.php"; ?> 