<!-- HEADER -->
<?php include "includes/header.php"; ?> 


<?php 
    if (isset($_POST['submit'])) {
        $evnt_title = mysqli_real_escape_string($db->link,$_POST['evnt_title']);
        $evnt_details = mysqli_real_escape_string($db->link,$_POST['evnt_details']);
        
       
        ///image file query
              $event_img = $_FILES['event_img']['name'];
              $extension = strtolower(substr($event_img,strlen($event_img)-4,strlen($event_img)));
              $allowed_extensions = array(".jpg","jpeg",".png",".gif");
              if(in_array($extension,$allowed_extensions)){

              $destination = "img/".$event_img;  
              $file = $_FILES['event_img']['tmp_name'];
              move_uploaded_file($file, $destination);                    
        ///ending image file query


        if (!empty($evnt_title) && !empty($evnt_details) && !empty($event_img) ) {
           $query = "INSERT INTO event(event_title,event_details,event_img) VALUES('{$evnt_title}','{$evnt_details}','{$event_img}') ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<p style='color:green;text-align:center;'>event created successfully</p>";
            }else{
                 echo "<p style='color:red;text-align:center;'>opps!! event is not created</p>";
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
              <h1>Event Information Here</h1>
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
             <form action="add_event.php" method="post" enctype="multipart/form-data">
               <label for="">Event Title<span>*</span>&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&emsp;</label>
               <input class="input-width" name="evnt_title" type="text" required="">
               <label for="">Event Paragraph <span>*</span>&nbsp;&nbsp;&nbsp;:&emsp;</label>
               <textarea name="evnt_details" id="" cols="30" rows="5"></textarea><br><br>
               <label for="">Event Photo <span>*</span>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
               <input type="file" class="input-width" name="event_img"><br><br>
               <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary btn-primary1">
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