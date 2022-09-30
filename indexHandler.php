<?php 
include("header1.php");
$start=$_POST['sdate'];
$end=$_POST['edate'];
$tehsil=$_POST['tehsilname'];
$title=$_POST['title'];
//select dates query
//End dates selection query

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row d-flex align-items-center justify-content-center">
<div class="col-lg-3 col-md-3 col-sm-3"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <form method="post" action="index.php" name="f1">

                           
<div class="form-group">
<label for="exampleFormControlSelect1">Start Date</label>
<select class="form-control" id="sdate" name="sdate">


  <option selected value="<?php echo $start;?>"><?php echo $start;?></option>

</select> 
<label for="exampleFormControlSelect1">End Date</label>
<select class="form-control" id="edate" name="edate">


  <option selected value="<?php echo $end;?>"><?php echo $end;?></option>

</select> 
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Select Tehsil</label>
<select class="form-control" id="tehsilname" name="tehsilname">
<option selected value="<?php echo $tehsil;?>"><?php echo $tehsil;?></option>

</select>
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Select Training Title</label>
<select class="form-control" id="title" name="title">
<option selected value="<?php echo $title;?>"><?php echo $title;?></option>

</select>
</div>
</form>
</div>
<div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>
                       
                    </div>
                </div>

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Training Details</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            <table class="table table-striped table-sm mb-3">
                                <thead>
                                <tr>
                                <th>Expected Participants</th>
                                <th> Present Participants</th>
                                <th>Total Males</th>
                                <th>Total Females</th>
                                <th> Total No Of Classes</th>
                                <th> Total No of MTs</th>
                                <th> MT Names</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                           <?php
                           include("db_con.php");
                           $sql="SELECT * FROM training_details where startdate='$start' AND enddate='$end' AND training_title='$title' AND tehsil='$tehsil' ";
                           $res=mysqli_query($conn,$sql);
                           if($res)
                           {                               
                               while($row=mysqli_fetch_array($res)){

                                  ?> 
                            <tr>   
                            <td > <?php echo $row['expected_par']; ?></td>  
                            <td > <?php echo $row['stationary_recvd_par']; ?></td>  
                            <td> <?php echo $row['total_no_male']; ?></td>  
                            <td > <?php echo $row['total_no_female']; ?></td>  
                            <td > <?php echo $row['no_of_classes']; ?></td>  
                            <td ><?php echo $row['no_of_mts']; ?></td>  
                          </tr> 


                              <?php }
                              }?>
                              </tbody>  </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->

                </div>
                <div class="row d-flex justify-content-center pb-5 mb-5">
                              <div class="col-lg-8 col-sm-8 col-md-8">
                              <form action="" method="post">
                                <label>Enter Stationary Amount Per Participant</label>
                              <input type="text" id="sta" name="sta"><br><br>
                              <label>Enter Amount Per Master Trainer</label>
                              <input type="text" id="mt" name="mt"><br><br>
                              <label>Enter venue cost</label>
                              <input type="text" id="venue" name="venue"><br>
                              <button class="btn btn-warning" onclick="calculate_budget();">Calculate Budget for tehsil</button>
                              </form>

                              </div>
                </div>
                <!-- End of Main Content -->
            </div>
        </div>
    </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   
</body>

</html>
