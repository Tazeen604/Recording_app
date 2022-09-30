<?php 
include("header1.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-3">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                    <div class="container mt-3">
    <span><a id="download" style="display: none;"><button type="button" class="btn btn-primary mb-4"> Download</button></a></span>
    <button type="button" onclick="recordAudio()" class="btn btn-info">Record Audio</button>
    <button type="button" onclick="recordVideo()" class="btn btn-info">Record Video</button>
    <button type="button" onclick="recordScreen()" class="btn btn-info">Record Screen</button>
    <div class="p-2">
        <video autoplay controls height='480' width="640" id="vid" muted></video>
    </div>
                            </div>
                            <!-- Card Body -->
                            
                           
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->

                </div>
                <!-- End of Main Content -->
            </div>
    <!-- Bootstrap core JavaScript-->
   

    <!-- Core plugin JavaScript-->
   

    <!-- Custom scripts for all pages-->
 <!--   <script src="js/sb-admin-2.min.js"></script> -->
    <script src="recording.js"></script>
</body>

</html>
