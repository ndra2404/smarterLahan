<?php
include 'config/connection.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "select * from users where username='$username' and password='$password'";
    $login = mysqli_query($conn,$sql);
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        session_start();
        $data = mysqli_fetch_assoc($login);
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data["level"];
        $_SESSION['login'] = $data;
        $_SESSION['status'] = "login";
        header("location:index.php");
    }else{
        echo "<script>alert('Username atau password Salah')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 23:18:51 GMT -->
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
	<link rel="shortcut icon" type="image/png" href="assets/images/logo_unbin.png">
	<link href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
   <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
				<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h1 class="title">Sign In</h1>
							<p></p>
						</div>
						<form action="" method="post">
							<div class="mb-4">
								<label class="mb-1 text-dark">Username</label>
								<input type="username" name="username" class="form-control form-control" placeholder="admin">
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Password</label>
								<input type="password" name="password" id="dz-password" class="form-control" placeholder="123456">
								<span class="show-pass eye">
								
									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>
								
								</span>
							</div>
							<div class="text-center mb-4">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
							</div>
						</form>
					</div>
				</div>
                <div class="col-xl-6 col-lg-6">
					<div class="pages-left h-100">
						<div class="login-content">
							<a href="index.html"><img src="assets/images/logo_unbin.png" width="120" class="mb-3 logo-dark" alt=""></a>
							<a href="index.html"><img src="assets/images/logi-white.png" class="mb-3 logo-light" alt=""></a>
							<h2>PENERAPAN METODE SMARTER UNTUK PEMETAAN LAHAN PERTANIAN TANAMAN PADI</h2>
						</div>
						<div class="login-media text-center">
							<img src="assets/images/login.png" alt="">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
 <script src="assets/vendor/global/global.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/deznav-init.js"></script>
<script src="assets/js/demo.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 23:18:52 GMT -->
</html>