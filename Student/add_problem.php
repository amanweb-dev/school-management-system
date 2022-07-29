<!-- HEADER -->
<?php include "includes/header.php" ; ?> 

<?php 
$userId = Session::get('userId');
?>


<!-- add problem query start-->

<?php 



if (isset($_POST['problem_text_submit'])) {

  $std_id = mysqli_real_escape_string($db->link,$_POST['std_id']);
  $tec_id = mysqli_real_escape_string($db->link,$_POST['tec_id']);
  $problem_title = mysqli_real_escape_string($db->link,$_POST['problem_title']);
  $problem_text = mysqli_real_escape_string($db->link,$_POST['problem_text']);



  $inseart_prob_query = "INSERT INTO student_problem(std_id,tchr_id,prb_title,prb_details) VALUES({$std_id},{$tec_id},'{$problem_title}','{$problem_text}') ";

  $result = $db->insert($inseart_prob_query);
  if ($result) {
    echo "<script>alert('problem has been submitted');</script> ";
  }else{
  echo "<script>alert('opps!! something went wrong');</script> ";
  }
 
}



 ?>



<!-- add problem query end-->



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
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="panel-heading1"><h3>Add Your Problem Here...!</h3></div>
              <form action="add_problem.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="home_image">Teacher ID</label>
                  <input class="form-control" type="text" name="tec_id" id="" required>
                </div>
                
                <div class="form-group">
                  <label for="home_image">Problem Title</label>
                  <input class="form-control" type="text" name="problem_title" id="" required>
                </div>
                <div class="space"></div>
                <h3>Problem texts</h3>
                <div class="form-group">
                  <textarea class="form-control" name="problem_text" id="" cols="30" rows="10"></textarea>
                </div>
                <input type="hidden" name="std_id" value="<?php echo $userId; ?> ">
                <div class="form-group">
                  <input class="btn btn-info" type="submit" name="problem_text_submit" value="Submit Problem">
                </div>
              </form>
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
  
<!-- FOOTER -->

<?php include "includes/footer.php"; ?> 