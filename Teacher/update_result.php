<!-- HEADER -->
<?php include "includes/header.php" ; ?>

<?php 
$userId = Session::get('userId');

if (isset($_GET['del'])) {
  
$del_id = $_GET['del'];

$del_query = "DELETE FROM result WHERE id = $del_id ";
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
            <h2>Result Information Here.....</h2>
          </div>
        </div>
      </div>

    </br>
    </br>
    </br>

      <div class="row">
        <div class="col-md-12">
        <div class="table-responsive">

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Class</th>
                    <th scope="col">Exam Type</th>
                    <th scope="col">Group</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Search</th>
                  </tr>
                </thead>
                <tbody>
                  <form action="update_result.php" method="post">
                    <tr>

                      <th scope="row">
                        <input class="design" type="number" name="id">
                      </th>

                      <td>
                       <select class="design" name="std_cls" id="">
                        <option value="">Select Class:</option>
                         <?php 

                      $query = "SELECT class FROM routine WHERE tchr_id = $userId GROUP BY class " ;
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $class_name=$rows['class'];

                        ?>
                         <option value="<?php echo $class_name; ?> "><?php echo $class_name; ?></option>

                      <?php }
                    }

                        ?>
                      </select>
                      </td>
                       <td>
                        <select class="design" name="type" id="">
                          <option value="">Slecet Type:</option>
                          <option value="Mid">Mid</option>
                          <option value="Final">Final</option>
              
                        </select>
                      </td>
                      <td>
                        <select class="design" name="std_group" id="">
                          <option value="">Slecet Group:</option>
                          <option value="Science">Science</option>
                          <option value="Humanities">Humanities</option>
                          <option value="Commerce">Commerce</option>
                        </select>
                      </td>
                      <td>
                        <select class="design" name="subjects" id="">
                          <option value="">Slecet Name:</option>

                           <?php 

                      $query = "SELECT subject FROM routine WHERE tchr_id = $userId GROUP BY subject " ;
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $subject_name=$rows['subject'];

                        ?>
                         <option value="<?php echo $subject_name; ?> "><?php echo $subject_name; ?></option>

                      <?php }
                    }

                        ?>
                        </select>
                      </td>
                      <td>
                        <input type="submit" name="submit" value="Search" class="btn btn-primary">
                      </td>
                    </tr> 
                  </form>
                </tbody>
              </table>
            </div>
          </div>
      </div>



    </br>
    </br>



      <div class="row">
        <div class="col">
          <div class="student-table">

            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Class</th>
                    <th scope="col">Exam Type</th>
                    <th scope="col">Group</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                    if (isset($_POST['submit'])) {
                        $id = mysqli_real_escape_string($db->link,$_POST['id']);
                        $std_cls = mysqli_real_escape_string($db->link,$_POST['std_cls']);
                        $type = mysqli_real_escape_string($db->link,$_POST['type']);
                        $std_group = mysqli_real_escape_string($db->link,$_POST['std_group']);
                        $subjects = mysqli_real_escape_string($db->link,$_POST['subjects']);

                        
                        $rslt_yr = date('Y');


                         $query = "SELECT * FROM std_ecademic_info WHERE std_id = $id AND class_year= $rslt_yr AND current_class = '$std_cls' ";
                          $query_result = $db->select($query);
                          if ($query_result) {

                            $query = "SELECT * FROM routine WHERE tchr_id = $userId  AND subject = '$subjects' AND class = '$std_cls' " ;
                          $query_result = $db->select($query);
                          if ($query_result) {

                            $query = "SELECT * FROM result WHERE stdnt_id = $id  AND subject = '$subjects' AND std_class = '$std_cls' AND result_year = $rslt_yr AND exam_type = '$type' AND std_group = '$std_group' " ;
                          $query_result = $db->select($query);
                          if ($query_result) {
            
                        while ($rows = $query_result->fetch_assoc()) {
                          $rslt_id = $rows['id'];
                          $stdnt_id = $rows['stdnt_id'];
                          $std_class = $rows['std_class'];
                          $exam_type = $rows['exam_type'];
                          $std_group = $rows['std_group'];
                          $subject = $rows['subject'];
                          $marks = $rows['marks'];
                          ?>

                          <tr>
                            <th scope="row"><?php echo $stdnt_id; ?></th>
                            <td><?php echo $std_class; ?></td>
                            <td><?php echo $exam_type; ?></td>
                            <td><?php echo $std_group; ?></td>
                            <td><?php echo $subject; ?></td>
                            <td><?php echo $marks; ?></td>
                            
                            <td>
                              <a href="edit_marks.php?edit=<?php echo $rslt_id; ?> "><button type="button" class="btn btn-primary">Update</button></a>
                              <a href="?del=<?php echo $rslt_id; ?> "><button type="button" class="btn btn-danger">Delete</button></a>
                              
                            </td>
                          </tr>

                       <?php }

          }else{

             echo "<p style='color:red;text-align:center;'>Mark is not assigned for this student</p>";

          }


          }else{
             echo "<p style='color:red;text-align:center;'>Subject is not matched</p>";
          }


           }else{

            echo "<p style='color:red;text-align:center;'>Student id not found</p>";

           }



}

?>


                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </br>
    </br>
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