<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
    if (isset($_GET['del'])) {
      $del_id = $_GET['del'];

      $query = "DELETE FROM contact WHERE id = $del_id";
      $del_result = $db->delete($query);
      if ($del_result) {
        echo "<p style='color:green;text-align:center;font-size:20px;'>Message deleted successfully</p>";
      }else{
        echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete message</p>";
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
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>


                   <?php 

                      $query = "SELECT * FROM contact WHERE status = 0 ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $id=$rows['id'];
                        $name=$rows['name'];
                        $email=$rows['email'];

                        ?>

                         <tr>
                          <th scope="row"><?php echo $name; ?> </th>
                          <td><?php echo $email; ?> </td>
                          
                          <td>
                            <a target="_blank" href="reply_message.php?reply=<?php echo $id; ?> "><button type="button" class="btn btn-primary">Reply</button></a>
                            <a href="?del=<?php echo $id; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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