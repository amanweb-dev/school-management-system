<!-- HEADER -->
<?php include "includes/header.php"; ?> 


<!--main content start-->


<?php 

if (isset($_GET['seen'])) {
  
$seen_id = $_GET['seen'];

$seen_query = "UPDATE  student_problem SET status = 2 WHERE id = $seen_id ";
$sol_rs = $db->update($seen_query);


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
           
           if (isset($_GET['show'])) {
             $show_id = $_GET['show'];
           
             $select = "SELECT * FROM student_problem WHERE id = $show_id ";
             $rs = $db->select($select);
             if ($rs) {
               $row = mysqli_fetch_array($rs);
           
               $id = $row['id'];
               $tchr_id = $row['tchr_id'];
               $prb_title = $row['prb_title'];
               $prb_details = $row['prb_details'];
               $solution = $row['solution'];
             }
           }
           
           
          
           ?>


           <form action="show_solution.php" method="post" enctype="multipart/form-data">
            

            <div class="form-group">
              <label for="home_image">Teacher Id</label>
              <input class="form-control" type="text" readonly name="tchr_id" value="<?php echo isset($_GET['show'])?$tchr_id : "" ?>" id="" disabled>
            </div>

            <div class="form-group">
              <label for="home_image">Problem Title</label>
              <input class="form-control" type="text" readonly name="solution_title" value="<?php echo isset($_GET['show'])?$prb_title : "" ?>" id="" disabled>
            </div>

            <div class="space"></div>

            <h3>Problem texts</h3>

            <div class="form-group">
              <textarea class="form-control" name="solution_text" readonly id="" cols="30" rows="5" disabled><?php echo isset($_GET['show'])?$prb_details : "" ?></textarea>
            </div>
            <h3>Solution texts</h3>

            <div class="form-group">
              <textarea class="form-control" name="solution_text" readonly id="" cols="30" rows="5" disabled><?php echo isset($_GET['show'])?$solution : "" ?></textarea>
            </div>
            <div class="form-group">
            </div>
          </form>
           <a href="?seen=<?php echo  $id; ?> "><button class="btn btn-info">Mark as Done</button></a>
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

<!-- javascripts -->

<!-- FOOTER -->

<?php include "includes/footer.php"; ?> 