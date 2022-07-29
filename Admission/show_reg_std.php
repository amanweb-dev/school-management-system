<!-- HEADER -->
<?php include "includes/header.php"; ?> 





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
            <h2>Registered Student</h2>
          </div>
        </div>
         <div class="col-md-4">
           <nav class="navbar" >
          <div class="container" style="margin-top: 25px;margin-left: 40px;">
            <form class="navbar-form navbar-left" action="" method="post">
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

            <?php 
              if (isset($_GET['del'])) {
                $del_id = $_GET['del'];

                $query = "DELETE FROM std_ecademic_info WHERE id = $del_id ";
                $del_result = $db->delete($query);
                if ($del_result) {
                  echo "<p style='color:green;text-align:center;font-size:20px;'>Registration cancled successfully</p>";
                }else{
                  echo "<p style='color:red;text-align:center;font-size:20px;'>fail to cancle Registration</p>";
                }
              }

          ?>


            
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Student Id</th>
                    <th>Class</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  

                    <?php 
                    if (isset($_POST['submit'])) {
                      $search = $_POST['search'];
                      
                    
                      $cr_yr = date('Y');
                      $query = "SELECT * FROM std_ecademic_info WHERE std_id = $search AND class_year = $cr_yr ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $id=$rows['id'];
                        $std_id=$rows['std_id'];
                        $current_class=$rows['current_class'];

                        ?>
                    <tr>
                    <th scope="row"><?php echo $std_id ?></th>
                    <td><?php echo $current_class ?></td>
                    
                     
                      <td>
                     <a href="?del=<?php echo $id; ?> "> <button class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>

                        <?php

                       }
                      }else{
                        echo "<script>alert('This Student is not registered yet');</script>";
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