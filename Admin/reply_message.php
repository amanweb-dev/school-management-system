<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
    if (isset($_GET['reply'])) {
      $reply_id = $_GET['reply'];

      $query = "SELECT * FROM contact WHERE id = $reply_id ";
      $query_result = $db->select($query);
      if ($query_result) {
        while ($rows = $query_result->fetch_assoc()) {
        $id=$rows['id'];
        $name=$rows['name'];
        $tomail=$rows['email'];
        $subject=$rows['subject'];
        $mailing_date=$rows['mailing_date'];

    }
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
    <div class="padding-area">
     <div class="student-area">
      <div class="row">
        <div class="col-md-8">
          <div class="title">
            <h2>User Message Here....</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="student-table">
            <div class="table-responsive">

              <?php 
                if (isset($_POST['sendmail'])) {
                    $tomail = $fm->validation($_POST['tomail']);
                    $frommail = $fm->validation($_POST['frommail']);
                    $subject = $fm->validation($_POST['subject']);
                    $massage = $fm->validation($_POST['massage']);
                    $id = $fm->validation($_POST['id']);

                    $tomail =  mysqli_real_escape_string($db->link,$tomail);
                    $frommail =  mysqli_real_escape_string($db->link,$frommail);
                    $subject =  mysqli_real_escape_string($db->link,$subject);
                    $massage =  mysqli_real_escape_string($db->link,$massage);


                    $sendMail = mail($tomail, $subject, $massage, $frommail);
                    if ($sendMail) {
                        echo "<p style='color:green;text-align:center;font-size:20px;'>Massage is sent successfully</p>";

                        $query = "UPDATE contact SET status = 1 WHERE id =  $id ";
                        $update_post = $db->update($query);


                    }else{
                        echo "<p style='color:red;text-align:center;font-size:20px;'>Massage sending failed</p>"; 
                    }

                }else{ ?>

                     <p><span style="font-weight: bold;font-size: 20px;">Name : </span><?php echo $name ?> </p>
                    <p><span style="font-weight: bold;font-size: 20px;">Email : </span><?php echo $tomail ?> </p>
                    <p><span style="font-weight: bold;font-size: 20px;">Message : </span><?php echo $subject ?> </p>

               <?php }



              ?>
 
             

              <hr><hr>

              <div class="col-md-6">
                <form action="reply_message.php" method="post">
                  <div class="form-group">
                    <label for="email">Your Email address:</label>
                    <input type="email" name="frommail" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Subject:</label>
                    <input type="text" class="form-control" name="subject">
                  </div>

                  <div class="form-group">
                    <label for="">Reply Message:</label></br>
                    <textarea name="massage" id="" cols="30" rows="10"></textarea>
                  </div>
                  <input type="hidden" name="tomail" value="<?php echo $tomail; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  
                  <button type="submit" name="sendmail" class="btn btn-default">Submit</button>
                </form>
              </div>  
                
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