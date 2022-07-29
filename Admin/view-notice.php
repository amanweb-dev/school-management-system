<!-- HEADER -->
<?php include "includes/header.php"; ?> 


<?php 
    if (isset($_GET['del'])) {
      $del_id = $_GET['del'];

      $query = "DELETE FROM notice WHERE notice_id = $del_id";
      $del_result = $db->delete($query);
      if ($del_result) {
        echo "<p style='color:green;text-align:center;font-size:20px;'>notice deleted successfully</p>";
      }else{
        echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete notice</p>";
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
            <h2>Notice Information Here.....</h2>
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
                    <th scope="col">Notice Tittle</th>
                    <th scope="col">Date</th>
                    <th scope="col">PDF File</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  

                    <?php 
                      $i=1;
                      $query = "SELECT * FROM notice ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $notice_id=$rows['notice_id'];
                        $notice_title=$rows['notice_title'];
                        $notice_date=$rows['notice_date'];
                        $notice_pdf=$rows['notice_pdf'];

                        ?>
                    <tr>
                    <th scope="row"><?php echo $notice_title ?></th>
                    <td><?php echo $notice_date ?></td>
                    <td><?php echo $notice_pdf ?></td>
                    <td>
                      <a href="edit_notice.php?edit=<?php echo $notice_id; ?>"><button type="button" class="btn btn-primary">Update</button></a>
                     <a href="?del=<?php echo $notice_id; ?> "> <button type="button" class="btn btn-danger">Delete</button></a>
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