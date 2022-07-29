<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
    if (isset($_GET['del'])) {
      $del_id = $_GET['del'];

      $query = "DELETE FROM routine WHERE rtn_id = $del_id ";
      $del_result = $db->delete($query);
      if ($del_result) {
        echo "<p style='color:green;text-align:center;font-size:20px;'>Routine deleted successfully</p>";
      }else{
        echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete Routine</p>";
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
          <li><a href="single_rtn.php?cls=<?php echo "Six"; ?>">Six</a></li>
          <li><a href="single_rtn.php?cls=<?php echo "Seven"; ?>">Seven</a></li>
          <li><a href="single_rtn.php?cls=<?php echo "Eight"; ?>">Eight</a></li>
          <li><a href="single_rtn.php?cls=<?php echo "Nine"; ?>">Nine</a></li>
          <li><a href="single_rtn.php?cls=<?php echo "Ten"; ?>">Ten</a></li>
  
        </ol>
      </div>
    </div>

    <!-- Start Body -->
    <div class="padding-area">
     <div class="student-area">
      <div class="row">
        <div class="col-md-6">
          <div class="title">
            <h2>Routine Information Here.....</h2>
          </div>
        </div>
        <div class="col-md-4">
           <nav class="navbar" >
          <div class="container" style="margin-top: 25px;margin-left: 40px;">
            <form class="navbar-form navbar-left" action="all_routine.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Enter teacher Id">
              </div>
              <input type="submit" name="submit" class="btn btn-success">
            </form>
          </div>
        </nav>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="student-table">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Teacher Code</th>
                    <th scope="col">Class</th>
                    <th scope="col">Shift</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Group</th>
                    <th scope="col">Days</th>
                    <th scope="col">Time</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    if (isset($_POST['submit'])) {
                      $search = $_POST['search'];
                      
                    
                      $query = "SELECT * FROM routine WHERE tchr_id = $search ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $rtn_id=$rows['rtn_id'];
                        $tchr_id=$rows['tchr_id'];
                        $class=$rows['class'];
                        $shift=$rows['shift'];
                        $subject=$rows['subject'];
                        $std_group=$rows['std_group'];
                        $days=$rows['days'];
                        $cls_time=$rows['cls_time'];
                        ?>

                        <tr>
                          <th scope="row"><?php echo $tchr_id; ?> </th>
                          <th scope="row"><?php echo $class; ?> </th>
                          <td><?php echo $shift; ?> </td>
                          <td><?php echo $subject; ?> </td>
                          <td><?php echo $std_group; ?></td>
                          <td><?php echo $days; ?></td>
                          <td><?php echo $cls_time; ?></td>
                          <td>
                            <!-- <a href="edit_rtn.php?edit=<?php echo $rtn_id; ?> "><button type="button" class="btn btn-primary">Update</button></a> -->
                            <a href="?del=<?php echo $rtn_id ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                          </td>
                        </tr>


                     <?php  }
                    }else{
                      echo "No routine Found.Please recheck id";
                    }
                  }else{ 


                     $query = "SELECT * FROM routine";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $rtn_id=$rows['rtn_id'];
                        $tchr_id=$rows['tchr_id'];
                        $class=$rows['class'];
                        $shift=$rows['shift'];
                        $subject=$rows['subject'];
                        $std_group=$rows['std_group'];
                        $days=$rows['days'];
                        $cls_time=$rows['cls_time'];
                        ?>

                        <tr>
                          <th scope="row"><?php echo $tchr_id; ?> </th>
                          <th scope="row"><?php echo $class; ?> </th>
                          <td><?php echo $shift; ?> </td>
                          <td><?php echo $subject; ?> </td>
                          <td><?php echo $std_group; ?></td>
                          <td><?php echo $days; ?></td>
                          <td><?php echo $cls_time; ?></td>
                          <td>
                           <!-- <a href="edit_rtn.php?edit=<?php echo $rtn_id; ?> "><button type="button" class="btn btn-primary">Update</button></a> -->
                            <a href="?del=<?php echo $rtn_id ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                          </td>
                        </tr>




                 <?php }
               }
             }
                        

                        ?>







                  

                </tbody>
              </table>
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