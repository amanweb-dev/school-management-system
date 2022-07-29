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
    <div class="panel panel-info">
      <div class="panel-heading"><h3>Here is your Results</h3></div>
      <div class="row">
        <div class="col-md-6">
           <h2 style="text-align: center;background: red;color:#ffff;">Mid Examination Result</h2>
          <table class="table center table-bordered table-stripe">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Subject Name</th>
            <th>mark</th>
            <th>Grade Letter</th>
            <th>Grade Point</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          $view_id = Session::get('userId');
          $crnt_yr = date('Y');

          $query = "SELECT * FROM result WHERE stdnt_id = $view_id AND result_year = $crnt_yr AND exam_type = 'Mid' ";

$query_result = $db->select($query);
if ($query_result) {
  while ($rows = $query_result->fetch_assoc()) {
    $stdnt_id=$rows['stdnt_id'];
    $subject=$rows['subject'];
    $exam_type=$rows['exam_type'];
    $marks=$rows['marks'];
    $grade_letter=$rows['grade_letter'];
    $grade_point=$rows['grade_point'];
    ?>

          <tr>
           <td><?php echo $stdnt_id; ?></td>
           <td><?php echo $subject; ?></td>
           <td><?php echo $marks; ?></td>
           <td><?php echo $grade_letter; ?></td>
           <td><?php echo $grade_point; ?></td>

           
         </tr>


 <?php }
}


           ?>



         
       </tbody>
     </table>
        </div>
        <div class="col-md-6">
            <h2 style="text-align: center;background: red;color:#ffff;">Final Examination Result</h2>
          <table class="table center table-bordered table-stripe">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Subject Name</th>
            <th>mark</th>
            <th>Grade Letter</th>
            <th>Grade Point</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          $view_id = Session::get('userId');
          $crnt_yr = date('Y');

          $query = "SELECT * FROM result WHERE stdnt_id = $view_id AND result_year = $crnt_yr AND exam_type = 'Final' ";

$query_result = $db->select($query);
if ($query_result) {
  while ($rows = $query_result->fetch_assoc()) {
    $stdnt_id=$rows['stdnt_id'];
    $subject=$rows['subject'];
    $exam_type=$rows['exam_type'];
    $marks=$rows['marks'];
    $grade_letter=$rows['grade_letter'];
    $grade_point=$rows['grade_point'];
    ?>

          <tr>
           <td><?php echo $stdnt_id; ?></td>
           <td><?php echo $subject; ?></td>
           <td><?php echo $marks; ?></td>
           <td><?php echo $grade_letter; ?></td>
           <td><?php echo $grade_point; ?></td>

           
         </tr>


 <?php }
}


           ?>



         
       </tbody>
     </table>
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
  
<!-- FOOTER -->

<?php include "includes/footer.php"; ?> 