<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
    if (isset($_GET['del'])) {
      $del_id = $_GET['del'];

      $query = "DELETE FROM admission_admin WHERE a_a_id = $del_id";
      $del_result = $db->delete($query);
      if ($del_result) {
        echo "<p style='color:green;text-align:center;font-size:20px;'>admin deleted successfully</p>";
      }else{
        echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete admin</p>";
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
            <h2>Addmission Panel User Information Here.....</h2>
          </div>
        </div>
        <div class="col-md-2">
          <div class="search1">
            <input class="search-content1" type="text" placeholder="Search Here..">
            <i class="fa fa-search mar1" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="student-table">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>


                   <?php 

                      $query = "SELECT * FROM admission_admin ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $a_a_id=$rows['a_a_id'];
                        $u_name=$rows['u_name'];
                        $u_pass=$rows['u_pass'];
                        $u_email=$rows['u_email'];
                        $gender=$rows['gender'];
                        $u_address=$rows['u_address'];
                        $u_contact=$rows['u_contact'];
                        $u_img=$rows['u_img'];

                        ?>

                         <tr>
                          <th scope="row"><?php echo $u_name; ?> </th>
                          <td><?php echo $u_email; ?> </td>
                          <td><?php echo $gender; ?> </td>
                          <td><?php echo $u_address; ?> </td>
                          <td><?php echo $u_contact; ?> </td>
                          
                          <td>
                            <a href="edit_addmission.php?edit=<?php echo $a_a_id; ?> "><button type="button" class="btn btn-primary">Update</button></a>
                            <a href="?del=<?php echo $a_a_id; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                          </td>
                        </tr>



                  <?php

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