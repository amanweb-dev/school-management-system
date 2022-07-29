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
          <li><i class="fa fa-home"></i><a href="index.html">Take Attendence</a></li>
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
            <h2>Add Attendence Here.....</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="student-table">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Shift</th>
                    <th scope="col">Group</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Attendence</th>
                    <th scope="col">Submit</th>
                  </tr>
                </thead>
                <tbody>
                  <form action="">
                    <tr>
                      <th scope="row">
                        <input type="number" name="id">
                      </th>
                      <td>
                        <select name="program" id="">
                          <option value="Slecet group:">Slecet Shift:</option>
                          <option value="Day">Day</option>
                          <option value="Evening">Evening</option>
                        </select>
                      </td>
                      <td>
                        <select name="program" id="">
                          <option value="Slecet group:">Slecet Group:</option>
                          <option value="Science">Science</option>
                          <option value="Humanities">Humanities</option>
                          <option value="Commerce">Commerce</option>
                        </select>
                      </td>
                      <td>
                        <select name="program" id="">
                          <option value="Slecet group:">Slecet Name:</option>
                          <option value="Bangla 1st part">Bangla 1st Part</option>
                          <option value="Bangla 2st part">Bangla 2st Part</option>
                          <option value="English 1st Part">English 1st Part</option>
                          <option value="English 2st Part">English 2st Part</option>
                          <option value="Math">Math</option>
                          <option value="ICT">ICT</option>
                          <option value="Physics">Physics</option>
                          <option value="Camestry">Camestry</option>
                          <option value="Biology">Biology</option>
                          <option value="Higher Math">Higher Math</option>
                          <option value="History">History</option>
                        </select>
                      </td>
                      <td>
                        <form action="">
                          <input type="number" name="number">
                        </form>
                      </td>
                      <td>
                        <button type="button" class="btn btn-primary">Submit</button>
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
