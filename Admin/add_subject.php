<!-- HEADER -->
<?php include "includes/header.php"; ?> 



<?php 
    if (isset($_POST['submit'])) {
        $s_code = mysqli_real_escape_string($db->link,$_POST['s_code']);
        $s_name = mysqli_real_escape_string($db->link,$_POST['s_name']);
        $s_class = mysqli_real_escape_string($db->link,$_POST['s_class']);
        $s_group = mysqli_real_escape_string($db->link,$_POST['s_group']);
    
       
       


        if (!empty($s_code) && !empty($s_name) && !empty($s_class) && !empty($s_group)) {
           $query = "INSERT INTO subject(subject_code,subject_name,subject_class,subject_group) VALUES('{$s_code}','{$s_name}','{$s_class}','{$s_group}') ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<p style='color:green;text-align:center;'>Subject created successfully</p>";
            }else{
                 echo "<p style='color:red;text-align:center;'>opps!! Subject is not created</p>";
            }

        }else{
            echo "<p style='color:red;text-align:center;'>Field must not be empty</p>";
        }

    

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
               <h1>Notice Infromation Input Here</h1>
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
               <form action="add_subject.php" method="post" enctype="multipart/form-data">
                 <label for="">Subject Code <span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input class="input-width" name="s_code" type="text" required="">
                 <label for="">Subject Name<span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <input class="input-width" name="s_name" type="text" required="">
                 <label for="">Subject Class<span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                 <select class="r_design" name="s_class" id="">
                  <option value="">Select Class:</option>
                  <option value="All">All</option>
                  <option value="Six">Six</option>
                  <option value="Seven">Seven</option>
                  <option value="Eight">Eight</option>
                  <option value="Nine">Nine</option>
                  <option value="Ten">Ten</option>
                </select>

                 <label for="">Subject Group<span>*</span>&emsp;&nbsp;&nbsp;:&emsp;</label>
                <select class="r_design" name="s_group" id="">
                  <option value="">Select Group:</option>
                  <option value="All">All</option>
                  <option value="Science">Science</option>
                  <option value="Humanities">Humanities</option>
                  <option value="Commerce">Commerce</option>
                </select>
                
                 <input type="submit" name="submit" class="btn btn-primary btn-primary1" value="SUBMIT">
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