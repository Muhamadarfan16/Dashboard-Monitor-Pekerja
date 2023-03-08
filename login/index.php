<?php
include '../database.php';
session_start();
 
if (isset($_SESSION['kb'])) {
  $kb =  $_SESSION['kb'];
  if($kb=='Pekerja'){
    header("Location: ../pekerja");
  }else if($kb=='DH'){
    header("Location: ../divisionhead");
  }else if($kb=='HM'){
    header("Location: ../manager");
  }
}

if (isset($_POST['submit'])) {
    $pn = $_POST['pn'];
    // echo $pn;
    // $password = md5($_POST['password']);
    $password = $_POST['pw'];
    // echo $password;
    
    // login dan cek, jika data susai dengan tugasnya maka bisa melakukan pengiriman tugas
    $sql = "SELECT * FROM users WHERE PN='$pn' AND Password='$password'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    // echo $result;
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['pn'] = $row['PN'];
        $_SESSION['nm'] = $row['Name'];
        $_SESSION['kb'] = $row['KB'];
        $_SESSION['function'] = $row['Function'];
        session_start(); //biang kerok
        $kb =  $row['KB'];
        if($kb=='Pekerja'){
            // echo "berhasil";
          header("Location: ../pekerja");
        }else if($kb=='DH'){
            // echo "berhasil";
          header("Location: ../divisionhead/index.php");
        }else if($kb=='HM'){
            // echo "berhasil";
          header("Location: ../manager");
        }
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Vendors Min CSS -->
        <link rel="stylesheet" href="assets/css/vendors.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- style.css -->
        <link rel="stylesheet" href="style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


        <title>HCBP Division</title>

        <link rel="icon" type="image/png" href="assets/img/logoo.png">
    </head>
  
    <body>
        <!-- Start Login Area -->
        <div class="login-area bg-image">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="login-form" style="margin-left: 50px;padding-top: 25px;padding-bottom: 25px;padding-left: 25px;padding-right: 25px;">
                        <div class="logo">
                            <a href="google.com"><img src="assets/img/logo.png" alt="image" style="width:200px"></a>
                        </div>

                        <h2>Welcome, Dashboard HCBP Division</h2>

                        <form method="post" action="">
                            <div class="form-group">
                                <input type="text" id="form3Example3" name="pn" class="form-control form-control-lg" placeholder="Personal Number">
                                <span class="label-title"><i class='bx bx-user'></i></span>
                            </div>

                            <div class="form-group">
                                <input type="password" id="form3Example4" name="pw" class="form-control form-control-lg"  placeholder="Password">
                                <span class="label-title"><i class='bx bx-lock'></i></span>
                            </div>

                            <div class="form-group">
                                <div class="remember-forgot">
                                    <label class="checkbox-box">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!-- <a href="forgot-password.html" class="forgot-password">Forgot password?</a> -->
                                </div>
                            </div>

                            <div class="text-center">
                              <button name="submit" class="btn btn-lg login-btn">Login</button>
                              <p class="mb-0">Copyright © 2020. PT BRI Human Capital Bussines</p>
                            </div>
                            <!-- <p class="mb-0">Don’t have an account? <a href="register-with-image.html">Sign Up</a></p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Login Area -->
        

        <!-- Vendors Min JS -->
        <script src="assets/js/vendors.min.js"></script>

        <!-- ApexCharts JS -->
        <script src="assets/js/apexcharts/apexcharts.min.js"></script>
        <script src="assets/js/apexcharts/apexcharts-stock-prices.js"></script>
        <script src="assets/js/apexcharts/apexcharts-irregular-data-series.js"></script>
        <script src="assets/js/apexcharts/apex-custom-line-chart.js"></script>
        <script src="assets/js/apexcharts/apex-custom-pie-donut-chart.js"></script>
        <script src="assets/js/apexcharts/apex-custom-area-charts.js"></script>
        <script src="assets/js/apexcharts/apex-custom-column-chart.js"></script>
        <script src="assets/js/apexcharts/apex-custom-bar-charts.js"></script>
        <script src="assets/js/apexcharts/apex-custom-mixed-charts.js"></script>
        <script src="assets/js/apexcharts/apex-custom-radialbar-charts.js"></script>
        <script src="assets/js/apexcharts/apex-custom-radar-chart.js"></script>

        <!-- ChartJS -->
        <script src="assets/js/chartjs/chartjs.min.js"></script>
        <div class="chartjs-colors"> <!-- To use template colors with Javascript -->
            <div class="bg-primary"></div>
            <div class="bg-primary-light"></div>
            <div class="bg-secondary"></div>
            <div class="bg-info"></div>
            <div class="bg-success"></div>
            <div class="bg-success-light"></div>
            <div class="bg-danger"></div>
            <div class="bg-warning"></div>
            <div class="bg-purple"></div>
            <div class="bg-pink"></div>
        </div>
        
        <!-- jvectormap Min JS -->
        <script src="assets/js/jvectormap-1.2.2.min.js"></script>
        <!-- jvectormap World Mil JS -->
        <script src="assets/js/jvectormap-world-mill-en.js"></script>
        <!-- Custom JS -->
        <script src="assets/js/custom.js"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>