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
          <li><i class="fa fa-home"></i><a href="index.html">Update Attendence</a></li>
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
            <h2>Attendence Information Here.....</h2>
          </div>
        </div>
        <div class="col-md-2">
          <div class="search1">
            <input class="search-content1" type="text" placeholder="Search Here..">
            <i class="fa fa-search mar1" aria-hidden="true"></i>
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
                    <th scope="col">Subject</th>
                    <th scope="col">Attendence</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">15163203113</th>
                    <td>Day</td>
                    <td>Science</td>
                    <td>Bangla 1st Part</td>
                    <td>80%</td>
                    <td>
                      <button type="button" class="btn btn-primary">Update</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">15163203113</th>
                    <td>Evening</td>
                    <td>Humanities</td>
                    <td>Bangla 2st Part</td>
                    <td>85%</td>
                    <td>
                      <button type="button" class="btn btn-primary">Update</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>

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