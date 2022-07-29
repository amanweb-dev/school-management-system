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
          <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
          <li><i class="fa fa-home"></i><a href="index.php">Form</a></li>
          <li><i class="fa fa-laptop"></i>Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- Start Body -->
    <div class="border">
       <div class="header-area">
         <div class="container">
           <div class="row">
             <div class="col">
               <div class="header-title">
                 <h1>Harimohan Goverment High School</h1>
               </div>
             </div>
           </div>
         </div>
       </div>
     <div class="logo-area">
       <div class="container">
         <div class="row">
           <div class="col-md-3">
             <div class="logo">
              <a href=""><img src="img/logo.jpg" alt=""></a>
            </div>
          </div>
          <div class="col-md-6">
           <div class="adress">
             <p>Kathal Bagicha, Chapainawabganj sadar. <br>Chapainawabganj, Bangladesh.</p>
             <p>Phone:+88 0781 52435</p>
             <p>Website:Hairmohan.com</p>
             <p>Email:harimahan@gmail.com</p>
           </div>
         </div>
         <div class="col-md-3">
           <div class="std-pic">
             <p>Student Picture</p>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="header-width">
     <div class="container">
       <div class="row">
         <div class="col">
           <div class="header-title1">
             <h1>Application for Admission</h1>
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
             <form action="form_confirmation.php" method="post" enctype="multipart/form-data">
               <label for="">Name of the Group&emsp; :&emsp;</label>
               <select class="select-width" name="std_group" id="">
                 <option value="">Select Group</option>
                 <option value="Sceience">Sceience</option>
                 <option value="Humanities">Humanities</option>
                 <option value="Commerce">Commerce</option>
               </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label for="">Shift&emsp; :&emsp;</label>
               <select class="select-width" name="shift" id="">
                 <option value="">Select Shift</option>
                 <option value="Morning">Morning</option>
                 <option value="Noon">Noon</option>
               </select>&emsp;&emsp;&emsp;
               <label for="">Class&emsp; :&emsp;</label>
                <select class="select-width" name="class" id="">
                 <option value="">Select Class</option>
                 <option value="six">Six</option>
                 <option value="Seven">Seven</option>
                 <option value="Eight">Eight</option>
                 <option value="Nine">Nine</option>
                 <option value="Ten">Ten</option>
               </select><br>
               <label for="">Applicant's Name <span>*</span>&emsp;:&emsp;</label>
               <input class="input-width" type="text" name="std_name" required="">
               <label for="">Father Name <span>*</span>&emsp;&emsp;&emsp;:&emsp;</label>
               <input class="input-width" type="text" name="ftr_name" required="">
               <label for="">Mother Name <span>*</span>&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
               <input class="input-width" type="text" name="mtr_name" required="">
               <label for="">Date of Birth <span>*</span>&emsp;&emsp;&emsp;:&emsp;</label>
               <input type="date" class="address" name="birth_date">&emsp;&emsp;
               <label for="">Applicant's Gender <span>*</span>:&emsp;</label>
               <input type="checkbox" name="gender" value="Male">
               <label for="">&nbsp;&nbsp;Male&nbsp;&nbsp;</label>
               <input type="checkbox" name="gender" value="Female">
               <label for="">&nbsp;&nbsp;Female&nbsp;&nbsp;</label>
               <input type="checkbox" name="gender" value="Other">
               <label for="">&nbsp;&nbsp;Other</label><br>
               <label for="">Nationality <span>*</span>&emsp;&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
               <select class="select-width" name="nationality" id="">
                 <option value="">Select One</option>
                 <option value="Bangladeshi">Bangladeshi</option>
                 <option value="Others">Others</option>
                 <!-- <option value="2002">2002</option>
                 <option value="2003">2003</option>
                 <option value="2004">2004</option>
                 <option value="2005">2005</option> -->
               </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label for="">Religion <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
               <select class="select-width" name="religion" id="">
                 <option value="">Select One</option>
                 <option value="Islam">Islam</option>
                 <option value="Sonaton">Sonaton</option>
                 <option value="Others">Others</option>
                 <!-- <option value="2003">2003</option>
                 <option value="2004">2004</option>
                 <option value="2005">2005</option> -->
               </select><br>
               <p class="add-bg">Mailing/Present Address</p>
               <label for="">Care of <span>*</span>&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;</label>
               <input class="input-width" type="text" name="care_of" required=""><br>
               <label for="">Village/Town/<br>Road/House <span>*</span>&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;</label>
               <textarea name="address" id="" cols="30" rows="5"></textarea><br><br>
              <!--  <label for="">District <span>*</span>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;</label>
               <input class="select-width" type="text" name="" id="">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label for="">Upazila <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
               <input class="select-width" type="text" name="" id=""><br> -->

               <label for="">District&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
               <input class="address" type="text" name="district" required="">&emsp;&emsp;&emsp;&emsp;
               <label for="">Upazila&emsp;&emsp;:&emsp;</label>
               <input class="address" type="text" name="upazila" required=""><br>

               <label for="">Post Office <span>*</span>&emsp;&emsp;&emsp;:&emsp;</label>
               <input class="input-width" type="text" name="post_office" required=""><br>
               <label for="">Post Code <span>*</span>&emsp;&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
               <input class="input-width" type="text" name="post_code" required=""><br>
               <label for="">Father Mobile Number<span>*</span>:</label>
               <input class="address" type="text" name="ftr_number" required="">
               <label for="">Personal Mobile Number:</label>
               <input class="address" type="text" name="std_number" required=""><br>
               <label for="">Email Address&emsp;&emsp;:&emsp;</label>
               <input class="input-width" type="text" name="std_email" required=""><br>
               <p class="add-bg">PSC or Equivalent Academic Qualifications</p>
               <label for="">Examination Type<span>*</span>&emsp;&emsp;:&emsp;</label>
               <input class="address" type="text" name="psc_xm_type" id="">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label for="">Board <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
               <select class="select-width" name="psc_board" id="">
                 <option value="">Select One</option>
                 <option value="Barisal">Barisal</option>
                 <option value="Chittagong">Chittagong</option>
                 <option value="Comilla">Comilla</option>
                 <option value="Dhaka">Dhaka</option>
                 <option value="Jessore">Jessore</option>
                 <option value="Mymensingh">Mymensingh</option>
                 <option value="Rajshahi">Rajshahi</option>
                 <option value="Sylhet">Sylhet</option>
                 <option value="Dinajpur">Dinajpur</option>
                 <option value="Technical">Technical</option>
                 <option value="Madrasah">Madrasah</option>
               </select><br>
               <label for="">Roll&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
               <input class="address" type="text" name="psc_roll" required="">&emsp;&emsp;&emsp;&emsp;
               <label for="">Passing Year&emsp;&emsp;:&emsp;</label>
               <input class="address" type="text" name="psc_passing_yr" required=""><br>
               <p class="add-bg">JSC or Equivalent Academic Qualifications</p>
               <label for="">Examination Type<span>*</span>&emsp;&emsp;:&emsp;</label>
               <input class="address" type="text" name="jsc_xm_type" id="">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label for="">Board <span>*</span>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
               <select class="select-width" name="jsc_board" id="">
                 <option value="">Select One</option>
                 <option value="Select Group">Select One</option>
                 <option value="Barisal">Barisal</option>
                 <option value="Chittagong">Chittagong</option>
                 <option value="Comilla">Comilla</option>
                 <option value="Dhaka">Dhaka</option>
                 <option value="Jessore">Jessore</option>
                 <option value="Mymensingh">Mymensingh</option>
                 <option value="Rajshahi">Rajshahi</option>
                 <option value="Sylhet">Sylhet</option>
                 <option value="Dinajpur">Dinajpur</option>
                 <option value="Technical">Technical</option>
                 <option value="Madrasah">Madrasah</option>
               </select><br>
               <label for="">Roll&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:&emsp;</label>
               <input class="address" type="text" name="jsc_roll" required="">&emsp;&emsp;&emsp;&emsp;
               <label for="">Passing Year&emsp;&emsp;:&emsp;</label>
               <input class="address" type="text" name="jsc_passing_yr" required=""><br>
               <input type="submit" name="submit" class="btn btn-primary">
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


<!-- FOOTER --> 
<?php include "includes/footer.php"; ?> 