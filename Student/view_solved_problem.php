<!-- HEADER -->
<?php include "includes/header.php"; ?> 

<?php 
$userId = Session::get('userId');
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
    <div class="padding-area">
     <div class="student-area">
      <div class="row">
        <div class="col-md-8">
          <div class="title">
            <h2>Show Problem Here.....</h2>
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
            
                    <th scope="col">Teacher Id</th>
                    <th scope="col">Problem title</th>
                    <th scope="col">Problem Text</th>
                    <th scope="col">Show</th>
                  </tr>
                </thead>
                <tbody>


                     <?php 
                     
                       $select_query = "SELECT * FROM student_problem WHERE status = 1 OR status = 2  AND std_id = $userId ";
                       $result = $db->select($select_query);
                     
                       if ($result) {
                        while ($row =mysqli_fetch_assoc($result)) {
                          $id = $row['id'];
                          $tchr_id = $row['tchr_id'];
                          $prb_title = $row['prb_title'];
                          $prb_details = $row['prb_details'];
                          
                          ?>

                          <tr>
                            <th scope="row"><?php echo $tchr_id ?></th>
                            <td><?php echo $prb_title; ?></td>
                            <td><?php echo $prb_details; ?></td>
                            
                            <td>
                              <a href="show_solution.php?show=<?php echo $id; ?>" ><button type="button" class="btn btn-danger">Show Solution</button></a>
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
          
          <!-- Designed by <a href="#">Drop Out Dev</a> -->
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->

  
<!-- FOOTER -->
 
<?php include "includes/footer.php"; ?> 