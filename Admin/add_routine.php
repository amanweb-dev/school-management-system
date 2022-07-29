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
          <li><i class="fa fa-home"></i><a href="add_routine.html">Add Routine</a></li>
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
            <h2>Add Routine Here.....</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="student-table">
            <div class="table-responsive">

              <?php 
                if (isset($_POST['submit'])) {
                    $tchr_id = mysqli_real_escape_string($db->link,$_POST['tchr_id']);
                    $class = mysqli_real_escape_string($db->link,$_POST['class']);
                    $shift = mysqli_real_escape_string($db->link,$_POST['shift']);
                    $subject = mysqli_real_escape_string($db->link,$_POST['subject']);
                    $group = mysqli_real_escape_string($db->link,$_POST['group']);
                    $days = mysqli_real_escape_string($db->link,$_POST['days']);
                    $times = $_POST['times'];
                    $class_code = $_POST['class_code'];
                    $class_link = $_POST['class_link'];

                     $query = "SELECT * FROM routine WHERE tchr_id = $tchr_id AND days = '$days' AND cls_time = '$times' ";
                      $query_result = $db->select($query);
                      if (!$query_result) {

                        $query = "SELECT * FROM routine WHERE class = '$class' AND days = '$days' AND cls_time = '$times' ";
                      $query_result = $db->select($query);
                      if (!$query_result) {





                        if (!empty($tchr_id) && !empty($class) && !empty($shift) && !empty($subject) && !empty($group) && !empty($days) && !empty($times) ) {
                       $query = "INSERT INTO routine(tchr_id,class,shift,subject,std_group,days,cls_time,class_code,class_link) VALUES({$tchr_id},'{$class}','{$shift}','{$subject}','{$group}','{$days}','{$times}','{$class_code}','{$class_link}') ";
                        $insert_query_rslt = $db->insert($query);
                        if ($insert_query_rslt) {
                            echo "<p style='color:green;text-align:center;'>Routine Added successfully</p>";
                        }else{
                             echo "<p style='color:red;text-align:center;'>opps!! Routine is not Added</p>";
                        }

                    }else{
                        echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
                    }

                        
                      }else{
                        
                        echo "<p style='color:red;text-align:center;'>this class time is booked by another teacher</p>";
                      }

                        
                      }else{
                         echo "<p style='color:red;text-align:center;'>this teacher has another clas at this time</p>";
                      }

                


            }

            ?>





              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Teacher User ID</th>
                    <th scope="col">Class</th>
                    <th scope="col">Shift</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Group</th>
                    <th scope="col">Days</th>
                    <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <form action="add_routine.php" method="post" >
                    <tr>
                      <td>
                       <select class="r_design" name="tchr_id" id="">
                        <option value="">Select U_ID:</option>
                        <?php 

                          $query = "SELECT * FROM teacher_info";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $id=$rows['id'];
                        ?>
                         <option value="<?php echo $id; ?> "><?php echo $id; ?></option>

                     <?php }
                    }

                         ?>

                      </select>
                    </td>
                    <td>
                      <select class="r_design" name="class" id="">
                        <option value="">Select Class:</option>
                        <option value="Six">Six</option>
                        <option value="Seven">Seven</option>
                        <option value="Eight">Eight</option>
                        <option value="Nine">Nine</option>
                        <option value="Ten">Ten</option>
                      </select>
                    </td>
                     <td>
                      <select class="r_design" name="shift" id="">
                        <option value="">Select Shift:</option>
                        <option value="Day">Morning</option>
                        <option value="Evening">Noon</option>
                      </select>
                    </td>
                    <td>
                     <select class="r_design" name="subject" id="">
                      <option value="">Select Name:</option>
                      <?php 
                      $i=1;
                      $query = "SELECT * FROM subject GROUP BY subject_name ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $subject_name=$rows['subject_name'];

                        ?>
                         <option value="<?php echo $subject_name; ?> "><?php echo $subject_name; ?></option>

                      <?php }
                    }

                        ?>
                      
                     
                      <!-- <option value="Bangla 2st part">Bangla 2st Part</option>
                      <option value="English 1st Part">English 1st Part</option>
                      <option value="English 2st Part">English 2st Part</option>
                      <option value="Math">Math</option>
                      <option value="ICT">ICT</option>
                      <option value="Physics">Physics</option>
                      <option value="Camestry">Camestry</option>
                      <option value="Biology">Biology</option>
                      <option value="Higher Math">Higher Math</option>
                      <option value="History">History</option> -->
                    </select>
                  </td>
                  <td>
                    <select class="r_design" name="group" id="">
                      <option value="">Select Group:</option>
                      <option value="Science">Science</option>
                      <option value="Humanities">Humanities</option>
                      <option value="Commerce">Commerce</option>
                    </select>
                  </td>
                  <td>
                    <select class="r_design" name="days" id="">
                      <option value="">Select Days:</option>
                      <option value="Saturday">Saturday</option>
                      <option value="Sunday">Sunday</option>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thusday">Thusday</option>
                    </select>
                  </td>
                  <td>
                    <select class="r_design" name="times" id="">
                      <option value="">Select Times:</option>
                      <option value="8_9">8.00 AM to 9.00 AM</option>
                      <option value="9_10">9.00 AM to 10.00 AM</option>
                      <option value="10_11">10.00 AM to 11.00 AM</option>
                      <option value="11_12">11.00 AM to 12.00 AM</option>
                      <option value="1_2">1.00 PM to 2.00 PM</option>
                      <option value="2_3">2.00 PM to 3.00 PM</option>
                      <option value="3_4">3.00 PM to 4.00 PM</option>
                      <option value="4_5">4.00 PM to 5.00 PM</option>
                    </select>
                  </td>
                 
                  
                </tr> 
              
            </tbody>
            <thead>
               <tr>
                 <th scope="col">Class Room Code</th>
                 <th scope="col">Class Link</th>
                 <th scope="col">Submit</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                 <td>
                    <input type="text" class="r_design" name="class_code">
                  </td>
                  <td>
                    <input type="text" class="r_design" name="class_link">
                  </td>
                  <td>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    Designed by <a href="https://bootstrapmade.com/">Creative Coder</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- FOOTER  -->
<?php include "includes/footer.php"; ?> 