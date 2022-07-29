<!-- HEADER -->
<?php include "includes/header.php" ; ?>
 



<?php 

if (isset($_POST['update_problem'])) {

  $up_pr_id = $_POST['prb_id'];
  $solution_text = $_POST['solution_text'];


  $query_sol = "UPDATE student_problem SET solution = '{$solution_text}' WHERE id = $up_pr_id ";
  $rslt = $db->update($query_sol);
  if ($rslt) {
    
    $stts_up_query = "UPDATE student_problem SET status = 1 WHERE id = $up_pr_id ";

    $stts_up_query_rs = $db->update($stts_up_query);

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
                <li><i class="fa fa-home"></i><a href="index.html">Update Result</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>
              </ol>
            </div>
          </div>

          <!-- Start Body -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <?php 
            
            if (isset($_GET['up_prob_id'])) {
              $up_prob_id = $_GET['up_prob_id'];
            
              $select = "SELECT * FROM student_problem WHERE id = $up_prob_id ";
              $rs = $db->select($select);
              if ($rs) {
                $row = mysqli_fetch_array($rs);
            
                $prob_id = $row['id'];
                $prb_title = $row['prb_title'];
                $prb_details = $row['prb_details'];
              }
            }
            
            
            
             ?>

              
              <form action="solve_problem.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="up_pr_id" value="<?php echo isset($up_prob_id)?$up_prob_id : "" ?>">
                <div class="form-group">
                  <label for="home_image">Problem Title</label>
                  <input class="form-control" type="text" name="solution_title" value="<?php echo isset($up_prob_id)?$prb_title : "" ?>" id="" disabled>
                </div>
             
              <div class="space"></div>

              <h3>Problem texts</h3>

                <div class="form-group">
                  <textarea class="form-control" name="prb_text" id="" cols="30" rows="5" disabled><?php echo isset($up_prob_id)?$prb_details : "" ?></textarea>
                </div>

                <h3>Solution</h3>

                <div class="form-group">
                  <textarea class="form-control" name="solution_text" id="" cols="30" rows="5"></textarea>
                </div>

                <input type="hidden" name="prb_id" value="<?php echo $prob_id; ?> ">

                <div class="form-group">
                  <input class="btn btn-info" type="submit" name="update_problem" value="Give Solution">
                </div>
              </form>
            </div>
          </div>
      </section>
        <div class="text-center">
          <div class="credits">
         
          Designed by <a href="#">Drop Out Dev</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->
  
<!-- FOOTER -->

<?php include "includes/footer.php"; ?> 