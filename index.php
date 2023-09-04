<?php
include("config/connection.php");
session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from w3crm.dexignzone.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 23:19:44 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="kitaberkarya: software house didaerah bogor">
	<meta property="og:title" content="kitaberkarya: software house didaerah bogor">
	<meta property="og:description" content="kitaberkarya: software house didaerah bogor">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>PENERAPAN METODE SMARTER UNTUK PEMETAAN LAHAN PERTANIAN TANAMAN PADI</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="/assets/images/logo_unbin.png">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
   <link href="assets/css/style.css" rel="stylesheet">
   <script src="assets/vendor/global/global.min.js"></script>
	<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.bundle.min.js"></script>
     <script src="assets/js/custom.js"></script>
	<script src="assets/js/deznav-init.js"></script>
	<script src="assets/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
  <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
         <div class="nav-header">
            <a href="" class="brand-logo">
				<img src="assets/images/logo_unbin.png" width="50" />
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


		<?php
			include("include/header.php");
			include("include/sidebar.php");
		?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<?php
					 $pages = (isset($_GET['pages'])?$_GET['pages']:'home').".php";
					 include('pages/'.$pages);
				?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer out-footer">
            <div class="copyright">
               <p>Copyright © Developed by <a href="https://kitaberkarya.com/" target="_blank">kita berkarya</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
			


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    
</body>

</html>