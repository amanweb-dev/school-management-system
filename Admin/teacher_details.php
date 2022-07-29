
<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
    if (isset($_GET['del'])) {
      $del_id = $_GET['del'];

      $query = "DELETE FROM teacher_info WHERE id = $del_id ";
      $del_result = $db->delete($query);
      if ($del_result) {
        echo "<p style='color:green;text-align:center;font-size:20px;'>Teacher deleted successfully</p>";
      }else{
        echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete Teacher</p>";
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
        <div class="col-md-6">
          <div class="title">
            <h2>Teacher Information Here.....</h2>
          </div>
        </div>
        <div class="col-md-4">
           <nav class="navbar" >
          <div class="container" style="margin-top: 25px;margin-left: 40px;">
            <form class="navbar-form navbar-left" action="teacher_details.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search">
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
                    <th scope="col">Teacher Id</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Number</th>
                    <th scope="col">View</th>
                    <!-- <th scope="col">Update</th> -->
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                   <?php 
                    if (isset($_POST['submit'])) {
                      $search = $_POST['search'];
                      
                    
                      $i=1;
                      $query = "SELECT * FROM teacher_info WHERE id = $search ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $id=$rows['id'];
                        $t_name=$rows['t_name'];
                        $t_email=$rows['t_email'];
                        $t_designation=$rows['t_designation'];
                        $t_contact=$rows['t_contact'];
                        

                        ?>
                  <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $t_name; ?></td>
                    <td><?php echo $t_email; ?></td>
                    <td><?php echo $t_designation; ?></td>
                    <td><?php echo $t_contact; ?></td>
          
                    <td>
                      <a href="view_single_tchr.php?view_single=<?php echo $id ?> "><button type="button" class="btn btn-primary">View</button></a>
                    </td>
                    <!-- <td>
                      <a href="update_tchr.php?update=<?php echo $id ?> "><button type="button" class="btn btn-primary">Update</button></a>
                    </td> -->
                    <td>
                     <a href="?del=<?php echo $id; ?> "> <button type="button" class="btn btn-primary">Delete</button></a>
                    </td>
                  </tr>

                <?php 
              }
            }
          }else{


                      $query = "SELECT * FROM teacher_info";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $id=$rows['id'];
                        $t_name=$rows['t_name'];
                        $t_email=$rows['t_email'];
                        $t_designation=$rows['t_designation'];
                        $t_contact=$rows['t_contact'];
                        

                        ?>
                  <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $t_name; ?></td>
                    <td><?php echo $t_email; ?></td>
                    <td><?php echo $t_designation; ?></td>
                    <td><?php echo $t_contact; ?></td>
          
                   <td>
                      <a href="view_single_tchr.php?view_single=<?php echo $id ?> "><button type="button" class="btn btn-primary">View</button></a>
                    </td>
                   <!--  <td>
                      <a href="update_tchr.php?update=<?php echo $id ?> "><button type="button" class="btn btn-primary">Update</button></a>
                    </td> -->
                    <td>
                     <a href="?del=<?php echo $id; ?> "> <button type="button" class="btn btn-primary">Delete</button></a>
                    </td>
                  </tr>

                <?php 
              }
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
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">Creative Coder</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

<!-- FOOTER  --> 
<?php include "includes/footer.php"; ?> 