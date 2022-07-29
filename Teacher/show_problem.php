<!-- HEADER -->
<?php include "includes/header.php" ; ?>


<?php 

if (isset($_GET['del_prob_id'])) {
  
$del_prob_id = $_GET['del_prob_id'];

$del_query = "DELETE FROM student_problem WHERE id = $del_prob_id ";
$del_rs = $db->delete($del_query);


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
    <div class="padding-area">
     <div class="student-area">
      <div class="row">
        <div class="col-md-8">
          <div class="title">
            <h2>Show Problem Here.....</h2>
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
                    <th scope="col">Student ID</th>
                    <th scope="col">Problem_title</th>
                    <th scope="col">Problem_Text</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>


                      <?php 
                       $userId = Session::get('userId');
                      
                        $select_query = "SELECT * FROM student_problem WHERE status = 0 AND tchr_id = $userId ";
                        $result = $db->select($select_query);
                      
                        if ($result) {
                         while ($row =mysqli_fetch_assoc($result)) {
                           $id = $row['id'];
                           $std_id = $row['std_id'];
                           $tchr_id = $row['tchr_id'];
                           $prb_title = $row['prb_title'];
                           $prb_details = $row['prb_details'];

                           ?> 

                           <tr>
                            <th scope="row"><?php echo $std_id ?></th>
                            <td><?php echo $prb_title; ?></td>
                            <td><?php echo $prb_details; ?></td>
                           <!--  <td class="table_width1"><?php //echo $std_problem_title; ?></td>
                            <td class="table_width"><?php //echo $fm->validation($std_problem_details,80);?></td> -->
                            <td>
                             <a href="solve_problem.php?up_prob_id=<?php echo $id; ?>"> <button type="button" class="btn btn-primary">Solution</button></a>
                             <a href="?del_prob_id=<?php echo $id; ?>" onclick="return confirm('Are you sure to delete?')"><button type="button" class="btn btn-danger">Delete</button></a>
                           </td>
                         </tr>
                         


                         <?php
                        
                                                 }
                                                }
                        
                        
                         
                       ?>

                    
                   </div>
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

    Designed by <a href="#">Drop Out Dev</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- FOOTER -->
<?php include "includes/footer.php"; ?> 