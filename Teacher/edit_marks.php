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

<?php 


if (isset($_POST['update'])) {

  $r_id = $_POST['r_id'];
  $marks = $_POST['new_marks'];

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


if (!empty($marks) && !empty($grade_letter) && !empty($grade_point)) {
   $query = "UPDATE result SET marks = {$marks},grade_letter = '{$grade_letter}',grade_point= '{$grade_point}' WHERE id =  $r_id ";
    $update_query_rslt = $db->update($query);
    if ($update_query_rslt) {
        echo "<p style='color:green;text-align:center;'>Mark updated successfully</p>";
    }else{
         echo "<p style='color:red;text-align:center;'>opps!! Mark is not Updated</p>";
    }

}else{
    echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
}


}

 ?>


      

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
                    if (isset($_GET['edit'])) {

                        $rslt_id = $_GET['edit'];


                            $query = "SELECT * FROM result WHERE id = $rslt_id ";
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

                            <form action="edit_marks.php" method="post">
                              <td>
                                <input type="text" name="new_marks" value="<?php echo isset($_GET['edit'])?$marks:"updated" ?>">
                              </td>
                              <input type="hidden" name="r_id" value="<?php echo $rslt_id; ?> ">
                            <td>
                              <input type="submit" name="update" class="btn btn-primary">
                            </td>
                            </form>
                           
                          </tr>

                       <?php }

          }else{

             echo "<p style='color:red;text-align:center;'>Information Not Found</p>";

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
    
    Designed by <a href="#">Drop Out Dev</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->
  
<!-- FOOTER -->

<?php include "includes/footer.php"; ?> 