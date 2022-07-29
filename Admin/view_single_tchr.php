
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
               <h1>Teacher Profile</h1>
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
                if (isset($_GET['view_single'])) {
                  $view_id = $_GET['view_single'];

                 $query = "SELECT * FROM teacher_info WHERE id = $view_id";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $id=$rows['id'];
                        $t_name=$rows['t_name'];
                        $t_email=$rows['t_email'];
                        $t_designation=$rows['t_designation'];
                        $t_contact=$rows['t_contact'];
                        $t_qualification=$rows['t_qualification'];
                        $t_gender=$rows['t_gender'];
                        $t_address=$rows['t_address'];
                        $t_img=$rows['t_img'];

                }
              }
            }

            ?>

                <img width="350" height="350" src="img/<?php echo $t_img; ?> " alt=""></br></br></br>

               <form>
                 <label for="">Teacher Id <span>*</span>&emsp;&emsp;&nbsp;&nbsp;  :&emsp;&emsp;</label>
                 <input class="input-width" type="text" name="t_name" value="<?php echo $id ?> " disabled>
                 <label for="">Teacher Name <span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input class="input-width" type="text" name="t_name" value="<?php echo $t_name ?> " disabled>
                 <label for="">Email Address&emsp;&emsp;:&emsp;</label>
                 <input class="input-width" type="text" name="t_email" value="<?php echo $t_email ?> " disabled><br>
                 <label for="">Designation <span>*</span>&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input type="text" class="select-width" name="designation" value="<?php echo $t_designation ?> " disabled>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                 <label for="">Qualification <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                 <input type="text" class="select-width" name="qualification" value="<?php echo $t_qualification ?> " disabled><br>
                 <label for="">Applicant's Gender <span>*</span>:&emsp;</label>
                 <input type="text" name="gender" value="<?php echo $t_gender ?> " disabled></br>
                 
                 <label for="">Village/Town/<br>Road/House <span>*</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;</label>
                 <textarea name="address" id="" cols="30" rows="5" disabled><?php echo $t_address ?></textarea><br><br>
                 <label for="">Contact Number <span>*</span>&nbsp;&nbsp;:&emsp;</label>
                 <input class="address" type="text" name="contact" value="<?php echo $t_contact ?> " disabled>&emsp;&emsp;&emsp;
                 
                 <!-- <button class="btn btn-primary btn-primary1">Update</button>
 -->               </form>
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