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
               <h1>Teacher Information Input Here</h1>
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
                $t_name = mysqli_real_escape_string($db->link,$_POST['t_name']);
                $t_email = mysqli_real_escape_string($db->link,$_POST['t_email']);
                $designation = mysqli_real_escape_string($db->link,$_POST['designation']);
                $qualification = mysqli_real_escape_string($db->link,$_POST['qualification']);
                $gender = mysqli_real_escape_string($db->link,$_POST['gender']);
                $address = mysqli_real_escape_string($db->link,$_POST['address']);
                $contact = mysqli_real_escape_string($db->link,$_POST['contact']);


                      ///image file query
                $img = $_FILES['img']['name'];
                $extension = strtolower(substr($img,strlen($img)-4,strlen($img)));
                $allowed_extensions = array(".jpg","jpeg",".png",".gif");
                if(in_array($extension,$allowed_extensions)){

                  $destination = "img/".$img;  
                  $file = $_FILES['img']['tmp_name'];
                  move_uploaded_file($file, $destination);                    
                      ///ending image file query



                  $school_code = 124506;

                  $query = "SELECT * FROM teacher_info ORDER BY id DESC LIMIT 1";
                  $result = $db->select($query);
                  if (!$result) {
                   $id = $school_code.'001';
                 }else{

                  while($row = mysqli_fetch_assoc($result)) {
                    $id = intval($row['id']) + 1;
                  }

                }


                            //$join_date = date('d-m-y');
                $t_pass = rand();  


                if (!empty($id) && !empty($t_name) && !empty($contact) ) {
                 $query = "INSERT INTO teacher_info(id,t_name,t_pass,t_email,t_designation,t_qualification,t_gender,t_address,t_contact,t_img) VALUES({$id},'{$t_name}','{$t_pass}','{$t_email}','{$designation}','{$qualification}','{$gender}','{$address}','{$contact}','{$img}') ";
                 $insert_query_rslt = $db->insert($query);
                 if ($insert_query_rslt) {
                  echo "<p style='color:green;text-align:center;'>Teacher Added successfully</p>";

                  ?>

                  <div id="printableArea">

                    <div class="tchr_info">
                      <p>Teacher Id : <b><?php echo $id; ?></b></p><br>
                      <p>Password : <b><?php echo $t_pass; ?></b></p><br>
                    </div>
                  </div>
                  <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Details" />
                  <a href="teacher_login.php"><button class="btn btn-success">Back</button></a><br><br><br>

                  



                  <?php


                              // $tomail = $t_email;
                              // $subject = "Profile Login Information";
                              // $massage = "Teacher id :".$id." And Password : ".$t_pass. "Congratulations!!!Please login  your profile using this teacher id and password and change the Password.";
                              // $frommail = "abdulkarimkhan702@gmail.com";


                              // $sendMail = mail($tomail, $subject, $massage, $frommail);

                }else{
                 echo "<p style='color:red;text-align:center;'>opps!! Teacher is not Added</p>";
               }

             }else{
              echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
            }

          }else{
            echo "<p style='color:red;text-align:center;'>file type must be (.jpg,jpeg,.png,.gif)</p>"; 
          }

        }

        ?> 



        <form action="teacher_login.php" method="post" enctype="multipart/form-data">
         <label for="">Teacher Name <span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
         <input class="input-width" type="text" name="t_name" required>
         <label for="">Email Address&emsp;&emsp;:&emsp;</label>
         <input class="input-width" type="text" name="t_email" required><br>
         <label for="">Designation <span>*</span>&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
         <select class="select-width" name="designation" id="">
           <option value="Select Group">Select One</option>
           <option value="Head Teacher">Head Teacher</option>
           <option value="Assistant Head">Assistant Head</option>
           <option value="Assistant Teacher">Assistant Teacher</option>
         </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         <label for="">Qualification <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
         <select class="select-width" name="qualification" id="">
           <option value="">Select One</option>
           <option value="M.Sc.">M.Sc.</option>
           <option value="B.Sc.">B.Sc.</option>
           <option value="BBA">BBA</option>
           <option value="MBA">MBA</option>
           <option value="LLB">LLB</option>
           <option value="LAW">LAW</option>
         </select><br>
         <label for="">Applicant's Gender <span>*</span>:&emsp;</label>
         <input type="checkbox" name="gender" value="Male">
         <label for="">&nbsp;&nbsp;Male&nbsp;&nbsp;</label>
         <input type="checkbox" name="gender" value="Female">
         <label for="">&nbsp;&nbsp;Female&nbsp;&nbsp;</label>
         <input type="checkbox" name="gender" value="Other">
         <label for="">&nbsp;&nbsp;Other</label><br>
         <label for="">Village/Town/<br>Road/House <span>*</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;</label>
         <textarea name="address" id="" cols="30" rows="5"></textarea><br><br>
         <label for="">Contact Number <span>*</span>&nbsp;&nbsp;:&emsp;</label>
         <input class="address" type="text" name="contact" required="">&emsp;&emsp;&emsp;
         <label for="">Teacher Photo <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
         <input type="file" name="img"><br><br>
         <button type="submit" name="submit" class="btn btn-primary btn-primary1">SUBMIT</button>
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

  <script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>