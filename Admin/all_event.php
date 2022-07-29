<!-- HEADER -->
<?php include "includes/header.php"; ?>  
<?php 
    if (isset($_GET['delete'])) {
      $del_id = $_GET['delete'];

      $query = "DELETE FROM event WHERE event_id = $del_id";
      $del_result = $db->delete($query);
      if ($del_result) {
        echo "<p style='color:green;text-align:center;font-size:20px;'>event deleted successfully</p>";
      }else{
        echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete event</p>";
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
    <div class="border">
     <div class="header-width">
      <div class="container">
        <div class="margin-bottom">
          <div class="row">
             <table class="table table-dark table-hover table-bordered">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>

                  </tr>
                </thead>
                <tbody>
            <?php 
          //order by id desc limit 4
                      $query = "SELECT * FROM event order by event_id desc limit 4";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $event_id=$rows['event_id'];
                        $event_title=$rows['event_title'];
                        $event_details=$rows['event_details'];
                        $event_img=$rows['event_img'];
                        $event_details = $fm->makeShorter($event_details);

                        ?>


                            <tr>
                              <td><?php echo $event_title; ?></td>
                              <td><?php echo $event_details; ?></td>
                              <td><img width="100" height="100" src="img/<?php echo $event_img; ?>" alt=""></td>
                              <td><a href="edit_event.php?edit=<?php echo $event_id; ?> "><button class="btn btn-primary">Update</button></a></td>
                              <td><a href="?delete=<?php echo $event_id; ?> "><button class="btn btn-danger">Delete</button></a></td>
                              
                            </tr>
                            
                          







                        <!-- <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="gallery-img1">
                                <img src="img/ev1.jpg" alt="">
                              </div>
                            </div>
                            <div class="col-md-6 margin">
                              <div class="gallery-text">
                                <h2><?php echo $event_title; ?></h2>
                              <span><i class="fa fa-commenting-o" aria-hidden="true"></i> 214 Comments</span>
                                <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>895 Likes</span>
                                <p><?php echo $event_details; ?></p>
                              </div>
                            </div>
                          </div>
                            <a href="edit_event.php?edit=<?php echo $event_id; ?>"><button type="button" class="btn btn1 btn-primary">Update</button></a>
                             <a href="edit_event.php?delete=<?php echo $event_id; ?> "><button type="button" class="btn btn1 btn-primary">Delete</button></a>
                        </div> -->




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