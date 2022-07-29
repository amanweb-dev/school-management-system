<!-- HEADER -->
<?php include "includes/header.php" ; ?> 


<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>

          <?php 
            $userId = Session::get('userId');
            $query = "SELECT class FROM routine WHERE tchr_id = '$userId' GROUP BY class ";
            $query_result = $db->select($query);
            if ($query_result) {
              while ($rows = $query_result->fetch_assoc()) {
              $class=$rows['class'];

              ?>
               <li><i class="fa fa-home"></i><a href="index.html"><?php echo $class ?> </a></li>

            <?php }
          }

              ?>

          
          <!-- <li><i class="fa fa-laptop"></i>Dashboard</li> -->
        </ol>
      </div>
    </div>
    <!-- Start Body -->
    <!-- Start Body -->
    <div class="padding-area">
     <div class="student-area">
      <div class="row">
        <div class="col-md-8">
          <div class="title">
            <h2>Add Result Here.....</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="student-table">



<?php 
    if (isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($db->link,$_POST['id']);
        $std_cls = mysqli_real_escape_string($db->link,$_POST['std_cls']);
        $type = mysqli_real_escape_string($db->link,$_POST['type']);
        $std_group = mysqli_real_escape_string($db->link,$_POST['std_group']);
        $subjects = mysqli_real_escape_string($db->link,$_POST['subjects']);
        $marks = mysqli_real_escape_string($db->link,$_POST['number']);
        

        $rslt_yr = date('Y');

        if($marks>79 && $marks <101){
          $grade_letter = "A+";
          $grade_point = "5.00";

        }else if($marks>69 && $marks <80){

          $grade_letter = "A";
          $grade_point = "4.00";

        }else if($marks>59 && $marks <70){

          $grade_letter = "A-";
          $grade_point = "3.50";

        }else if($marks>49 && $marks <60){

          $grade_letter = "B";
          $grade_point = "3.00";

        }else if($marks>39 && $marks <50){

          $grade_letter = "C";
          $grade_point = "2.00";

        }else if($marks>32 && $marks <40){

          $grade_letter = "D";
          $grade_point = "1.00";

        }else{
          $grade_letter = "F";
          $grade_point = "0.00";
        }

         $query = "SELECT * FROM std_ecademic_info WHERE std_id = $id AND class_year= $rslt_yr AND current_class = '$std_cls' ";
          $query_result = $db->select($query);
          if ($query_result) {

            $query = "SELECT * FROM routine WHERE tchr_id = $userId  AND subject = '$subjects' AND class = '$std_cls' " ;
          $query_result = $db->select($query);
          if ($query_result) {

            $query = "SELECT * FROM result WHERE stdnt_id = $id  AND subject = '$subjects' AND std_class = '$std_cls' AND result_year = $rslt_yr AND exam_type = '$type' AND std_group = '$std_group' " ;
          $query_result = $db->select($query);
          if (!$query_result) {


            if (!empty($id) && !empty($std_cls) && !empty($type) && !empty($std_group) && !empty($subjects) && !empty($marks) && !empty($rslt_yr) && !empty($grade_letter) && !empty($grade_point)) {
                 $query = "INSERT INTO result(stdnt_id,std_class,exam_type,std_group,subject,marks,result_year,grade_letter,grade_point) VALUES({$id},'{$std_cls}','{$type}','{$std_group}','{$subjects}',{$marks},{$rslt_yr},'{$grade_letter}','{$grade_point}') ";
                  $insert_query_rslt = $db->insert($query);
                  if ($insert_query_rslt) {
                      echo "<p style='color:green;text-align:center;'>Mark Added successfully</p>";
                  }else{
                       echo "<p style='color:red;text-align:center;'>opps!! Mark is not Added</p>";
                  }

              }else{
                  echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
              }


          }else{

             echo "<p style='color:red;text-align:center;'>Mark is already assigned for this student</p>";

          }


          }else{
             echo "<p style='color:red;text-align:center;'>Subject is not matched</p>";
          }


           }else{

            echo "<p style='color:red;text-align:center;'>Student id not found</p>";

           }



}

?>


            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Class</th>
                    <th scope="col">Exam Type</th>
                    <th scope="col">Group</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Mark</th>
                    <th scope="col">Submit</th>
                  </tr>
                </thead>
                <tbody>
                  <form action="add_result.php" method="post">
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
                          <input class="design" type="number" name="number">

                      </td>
                      <td>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                      </td>
                    </tr> 
                  </form>
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