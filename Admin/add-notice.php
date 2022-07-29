<!-- HEADER -->
<?php include "includes/header.php"; ?> 



<?php 
    if (isset($_POST['submit'])) {
        $notice_title = mysqli_real_escape_string($db->link,$_POST['notice_title']);
        $notice_date =  $_POST['notice_date'];
       
        ///image file query
              $notice_file = $_FILES['notice_file']['name'];
              $extension = strtolower(substr($notice_file,strlen($notice_file)-4,strlen($notice_file)));
              $allowed_extensions = array(".pdf");
              if(in_array($extension,$allowed_extensions)){

              $destination = "pdf_file/".$notice_file;  
              $file = $_FILES['notice_file']['tmp_name'];
              move_uploaded_file($file, $destination);                    
        ///ending image file query


        if (!empty($notice_title) && !empty($notice_file) ) {
           $query = "INSERT INTO notice(notice_title,notice_date,notice_pdf) VALUES('{$notice_title}','{$notice_date}','{$notice_file}') ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<p style='color:green;text-align:center;'>notice created successfully</p>";
            }else{
                 echo "<p style='color:red;text-align:center;'>opps!! notice is not created</p>";
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
               <form action="add-notice.php" method="post" enctype="multipart/form-data">
                 <label for="">Notice Tittle <span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input class="input-width" name="notice_title" type="text" required="">
                 <label for="">Today Date <span>*</span>&nbsp;&nbsp;&nbsp;&emsp;:&emsp;</label>
                 <input class="address" type="date" name="notice_date" required="">&emsp;&emsp;&nbsp;
                 <label for="">Notice PDF File <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                 <input type="file" name="notice_file"><br><br>
                 <input type="submit" name="submit" class="btn btn-primary btn-primary1" value="SUBMIT">
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