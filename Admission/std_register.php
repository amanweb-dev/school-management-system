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
    <div class="border">
     <div class="header-width">
       <div class="container">
         <div class="row">
           <div class="col">
             <div class="header-title1">
               <h1>Student Registration</h1>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="form-area">
       <div class="container">
         <div class="row">
           <div class="col">
             <div class="admission-form">


                <?php 
    if (isset($_POST['submit'])) {
        $std_id = mysqli_real_escape_string($db->link,$_POST['std_id']);
        $std_class = mysqli_real_escape_string($db->link,$_POST['std_class']);
        $std_group = mysqli_real_escape_string($db->link,$_POST['std_group']);

        if (($std_class == 'Six' OR $std_class == 'Seven') OR ($std_class == 'Seven' OR $std_class == 'Eight')) {
         
          $query = "SELECT * FROM subject WHERE subject_class = 'All' ";
          $query_result = $db->select($query);
           if ($query_result) {
            $i=0;
              while ($rows = $query_result->fetch_assoc()) {
                $subject_name[$i]=$rows['subject_name'];
                $i++;

              }
               $subj = implode(',',$subject_name);
            
            } 

        }else if(($std_class == 'Nine' AND $std_group == 'Science') OR ($std_class == 'Ten' AND $std_group == 'Science')){


          // $query = "SELECT * FROM subject WHERE subject_group ='All' AND subject_class ='Science' ";

          $query = "SELECT * FROM subject WHERE subject_class = 'All' OR subject_class = 'Nine' AND subject_group = 'Science' ";
          $query_result = $db->select($query);

           if ($query_result) {
            $i=0;
              while ($rows = $query_result->fetch_assoc()) {
               $subject_name[$i]=$rows['subject_name'];
               $i++;

              }


               $subj = implode(',',$subject_name);
              
            }else{
              echo "errorrrrrrr";
            }

        }else if(($std_class == 'Nine' AND $std_group == 'Humanities') OR ($std_class == 'Ten' AND $std_group == 'Humanities')){

          $query = "SELECT * FROM subject WHERE subject_class = 'All' OR subject_class = 'Nine' AND subject_group = 'Humanities' ";
          $query_result = $db->select($query);

           if ($query_result) {
            $i=0;
              while ($rows = $query_result->fetch_assoc()) {
               $subject_name[$i]=$rows['subject_name'];
               $i++;

              }


               $subj = implode(',',$subject_name);
              
            }else{
              echo "errorrrrrrr22222";
            }

        }else if(($std_class == 'Nine'AND $std_group == 'Commerce') OR ($std_class == 'Ten'AND $std_group == 'Commerce')){

          $query = "SELECT * FROM subject WHERE subject_class = 'All' OR subject_class = 'Nine' AND subject_group = 'Commerce' ";
          $query_result = $db->select($query);

           if ($query_result) {
            $i=0;
              while ($rows = $query_result->fetch_assoc()) {
               $subject_name[$i]=$rows['subject_name'];
               $i++;

              }


               $subj = implode(',',$subject_name);
              
            }else{
              echo "errorrrrrrr22222";
            }

        }



        $query = "SELECT * FROM student_info WHERE id = $std_id ";
          $query_result = $db->select($query);
          if ($query_result) {

           $class_year = date('Y');

           $query = "SELECT * FROM std_ecademic_info WHERE std_id = $std_id AND class_year = $class_year ";
          $query_result = $db->select($query);

          if (!$query_result) {

            $query = "INSERT INTO std_ecademic_info(std_id,class_year,current_class,current_sub,std_group) VALUES({$std_id},{$class_year},'{$std_class}','{$subj}','{$std_group}') ";
           $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<p style='color:green;text-align:center;'>Student registration successfull</p>";

           

          }else{
            echo "<script>alert('opps!! something is wrong');</script>";
          }


          }else{
            echo "alredy register";
            echo "<script>alert('fail...!!!This Student is already registered');</script>";
          }


}else{
   echo "<script>alert('This Student is not admitted yet');</script>";
}
}

?>


               <form action="std_register.php" method="post" enctype="multipart/form-data">
                 <label for="">Student Id <span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input class="input-width" name="std_id" type="text" required="">
                 <label for="">Class<span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <select class="r_design" name="std_class" id="">
                  <option value="">Select Class:</option>
                  <option value="Six">Six</option>
                  <option value="Seven">Seven</option>
                  <option value="Eight">Eight</option>
                  <option value="Nine">Nine</option>
                  <option value="Ten">Ten</option>
                </select>

                 <label for="">Subject Group<span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                <select class="r_design" name="std_group" id="">
                  <option value="">Select Group:</option>
                  <option value="All">All</option>
                  <option value="Science">Science</option>
                  <option value="Humanities">Humanities</option>
                  <option value="Commerce">Commerce</option>
                </select>
                
                 <input type="submit" name="submit" class="btn btn-primary btn-primary1" value="Register">
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <div class="text-center">
  <div class="credits">
    Designed by <a href="#">Creative Coder</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- FOOTER  -->
<?php include "includes/footer.php"; ?> 