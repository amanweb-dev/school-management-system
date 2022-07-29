<!-- HEADER -->
<?php include "includes/header.php" ; ?>


<?php 

$view_id = Session::get('userId');
 $query = "SELECT * FROM teacher_info WHERE id = $view_id";
$query_result = $db->select($query);
if ($query_result) {
  while ($rows = $query_result->fetch_assoc()) {
  $id=$rows['id'];
  $t_name=$rows['t_name'];
  $t_email=$rows['t_email'];
  $t_designation=$rows['t_designation'];
  $t_contact=$rows['t_contact'];
  $t_qualification=$rows['t_qualification'];
  $t_gender=$rows['t_gender'];
  $t_address=$rows['t_address'];
  $t_img=$rows['t_img'];
  $t_pass=$rows['t_pass'];

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
          <li><i class="fa fa-home"></i><a href="index.html">My Profile</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- Start Body -->
    <div class="row">
      <div class="col-md-4">
        <img src="../Admin/img/<?php echo $t_img; ?> " width="380px" height="328" alt="">
      </div>
      <div class="col-md-8">
        <div class="panel panel-info">
          <div class="panel-heading"><h2>Wecome</h2></div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Attribute</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Name</td>
                <td><?php echo $t_name; ?></td>
              </tr>
              <tr>
                <td>Teacher ID</td>
                <td><?php echo $id; ?></td>
              </tr>
              <tr>
                <td>Designation</td>
                <td><?php echo $t_designation ?> </td>
              </tr>
              <tr>
                <td>Gender</td>
                <td><?php echo $t_gender; ?> </td>
              </tr>
              <tr>
                <td>Qualification</td>
                <td><?php echo $t_qualification;
                 ?> </td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?php echo $t_email; ?> </td>
              </tr>
              <tr>
                <td>Address</td>
                <td><?php echo $t_address; ?></td>
              </tr>
              <tr>
                <td>Contact</td>
                <td><?php echo $t_contact; ?></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><?php echo $t_pass; ?> <a href="edit_password.php?edit=<?php echo $id; ?>"><button style="margin-left: 50px;" class="btn btn-danger">Change Password</button></a></td>
              </tr>
            </tbody>
          </table>
        </div>
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