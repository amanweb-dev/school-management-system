<!-- HEADER -->
<?php include "includes/header.php"; ?> 


<?php 
    if (isset($_POST['submit'])) {
        $sub = mysqli_real_escape_string($db->link,$_POST['sub']);
        $mark = mysqli_real_escape_string($db->link,$_POST['mark']);

        $val = $sub."_".$mark;

        //$arr = array($val);
        //$string = implode(',',$arr);


         $query = "SELECT * FROM result";
          $query_result = $db->select($query);
          if ($query_result) {
            while ($rows = $query_result->fetch_assoc()) {
            $id=$rows['id'];
            $marks=$rows['marks'];

          }
          }else{
            $marks="none";

          }

        $arr = array($val,$marks);
        $string = implode(',',$arr);



        
       


        if (!empty($sub) && !empty($mark)) {
           $query = "UPDATE result set marks ='{$string}' ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<p style='color:green;text-align:center;'>event created successfully</p>";
            }else{
                 echo "<p style='color:red;text-align:center;'>opps!! event is not created</p>";
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
              <h1>Event Information Here</h1>
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
             <form action="test.php" method="post">
               <label for="">Sub<span>*</span>&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&emsp;</label>
               <input class="input-width" name="sub" type="text" required="">
                <label for="">Mark<span>*</span>&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;:&emsp;</label>
               <input class="input-width" name="mark" type="text" required="">
               <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary btn-primary1">
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
    Designed by <a href="https://bootstrapmade.com/">Creative Coder</a>
  </div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- FOOTER  -->
<?php include "includes/footer.php"; ?> 