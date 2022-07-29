<!-- HEADER -->
<?php include "includes/header.php"; ?> 


<?php 
if (isset($_GET['edit'])) {
  $event_id = $_GET['edit'];
  $query = "SELECT * FROM event WHERE event_id = $event_id";
   $query_result = $db->select($query);
    if ($query_result) {
      while ($rows = $query_result->fetch_assoc()) {
      $event_id=$rows['event_id'];
      $event_title=$rows['event_title'];
      $event_details=$rows['event_details'];
      $event_img_ex=$rows['event_img'];
      //$event_details = $fm->makeShorter($event_details);

 }                       
}

}



 ?>

<?php 
    if (isset($_POST['update'])) {
        $event_title_up = mysqli_real_escape_string($db->link,$_POST['event_title']);
        $event_details_up = mysqli_real_escape_string($db->link,$_POST['event_details']);
        
        $evn_id =  $_POST['evn_id'];
       
        ///image file query
              $event_img = $_FILES['event_img']['name'];
              $extension = strtolower(substr($event_img,strlen($event_img)-4,strlen($event_img)));
              $allowed_extensions = array(".jpg","jpeg",".png",".gif");
              if(in_array($extension,$allowed_extensions)){

              $destination = "img/".$event_img;
              $file = $_FILES['event_img']['tmp_name'];
              move_uploaded_file($file, $destination);                    
        ///ending image file query


        if (!empty($event_title_up) && !empty($event_details_up) && !empty($event_img)) { 
                       $query = "UPDATE event SET event_title = '$event_title_up',event_details='$event_details_up',event_img='$event_img' WHERE event_id =  $evn_id ";
                        $update_post = $db->update($query);
                        if ($update_post) {
                            echo "<p style='color:green;text-align:center;'>Event updated Successfully</p>";
                        }else{
                             echo "<p style='color:red;text-align:center;'>opps!! event is not updated</p>";
                        }

                    }else{
                        echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
                    }

    }else{
      echo "<p style='color:red;text-align:center;'>file type must be (.img)</p>"; 
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
             <form action="edit_event.php" method="post" enctype="multipart/form-data">
               <label for="">Event Title<span>*</span>&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&emsp;</label>
               <input class="input-width" name="event_title" value="<?php echo (isset($_GET['edit']))?$event_title: " ";  ?> " type="text" required="">
               <label for="">Event Paragraph <span>*</span>&nbsp;&nbsp;&nbsp;:&emsp;</label>
               <textarea name="event_details" id="" cols="30" rows="5"><?php  echo (isset($_GET['edit']))?$event_details: " ";  ?> </textarea><br><br>
               <label for="">Event uploaded Photo :</label>
                <img width="100" height="100" src="img/<?php echo (isset($_GET['edit']))?$event_img_ex: " ";   ?> " alt=""></br></br>
               <label for="">Event Photo <span>*</span>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
              
               <input type="file" class="input-width" name="event_img"><br><br>
                <input type="hidden" name="evn_id" value="<?php echo $event_id; ?> ">
               <input type="submit" name="update" value="SUBMIT" class="btn btn-primary btn-primary1">
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