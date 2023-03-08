<?php
session_start();

if (isset($_SESSION['kb'])) {
  $kb =  $_SESSION['kb'];
  if ($kb == 'Pekerja') {
    header("Location: ../pekerja");
  } else if ($kb == 'DH') {
    header("Location: ../divisionhead");
  }
} else {
  header("Location: ../login");
}
?>

<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Vendors Min CSS -->
  <link rel="stylesheet" href="assets/css/vendors.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="../style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="assets/css/responsive.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <!-- Ajax -->
  <script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
  <!-- moment.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


  <title>PIC HCBP</title>

  <link rel="icon" type="image/png" href="assets/img/logoo.png">
</head>

<body>
  <!-- <?php include '../header.php' ?> -->
  <!-- Start Main Content Wrapper Area -->
  <div class="main-content" style="padding-left: 8px; padding-right: 8px;">

    <nav class="navbar top-navbar navbar-expand">
      <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
          <span class="top-bar"></span>
          <span class="middle-bar"></span>
          <span class="bottom-bar"></span>
        </div>

        <ul class="navbar-nav left-nav align-items-center">
          <li class="logo-bri">
            <img src="assets/img/logo-bri.png" alt="image">
            </a>
          </li>
        </ul>

        <div class=" d-none mr-auto d-md-block">
          <h4 style><strong>DASHBOARD KERJA <?php echo $_SESSION['function']; ?></strong></h4>
        </div>

        <ul class="navbar-nav right-nav align-items-center">

          <li class="nav-item">
            <a class="nav-link bx-fullscreen-btn" id="fullscreen-button">
              <i class="bx bx-fullscreen"></i>
            </a>
          </li>

          <li class="nav-item dropdown profile-nav-item">
            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              <div class="menu-profile">
                <span class="name">
                  Hi,
                  <?php
                  echo $_SESSION['nm'];
                  ?>
                </span>
              </div>
            </a>

            <div class="dropdown-menu">
              <div class="dropdown-footer">
                <ul>
                  <li><a class="dropdown-item" href="../manager/index.php">Dashboard</a></li>
                  <li><a class="dropdown-item" href="./tambah.php">Tambah Task</a></li>
                  <li><a class="dropdown-item" href="../manager/pekerjaan_manager.php">Task</a></li>
                  <li><a class="dropdown-item" href="../statistik/index.php">Statistik Kinerja</a></li>
                </ul>
                <ul class="profile-nav">
                  <li class="nav-item"><a href="../logout/logout.php" class="nav-link">
                      <i class='bx bx-log-out'></i> <span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row mt-2">
      <div class="col-lg-6 col-md-12" style="padding-right: 5px; height:85vh;">
        <div class="card mb-30" style="padding-top: 10px; padding-left: 10px; margin-bottom: 10px;padding-right: 10px; padding-bottom: 10px; height:41vh">
          <div class="card-header d-flex justify-content-between align-items-center" style="margin-bottom: 0px;">
            <h3 style="text-align:center;width: 620px;padding-bottom: 1px;padding-top: 1px;"><strong>Project List</strong></h3>
          </div>

          <div class="card-body">
            <table class="table table-hover table-left table-sm" id="table-1" style="height: 35vh;">
              <thead>
                <tr class="border-keterangan table-info">
                  <th width="10px">No</th>
                  <th width="330px">Project Name</th>
                  <th width="60px">PIC</th>
                  <th width="80px">Deadline</th>
                  <th width="139px">Keterangan</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card mb-30" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px; margin-bottom: 15px; height:42vh">
          <div class="card-header d-flex justify-content-between align-items-center" style="margin-bottom: 0px;">
            <h3 style="text-align:center;width: 620px;padding-bottom: 1px;padding-top: 1px;"><strong>Comben List</strong></h3>
          </div>

          <div class="card-body">
            <table class="table table-hover table-left table-sm" id="table-2" style="height: 35vh">
              <thead>
                <tr class="border-keterangan table-info">
                  <th width="10px">No</th>
                  <th width="330px">Project Name</th>
                  <th width="60px">PIC</th>
                  <th width="80px">Deadline</th>
                  <th width="130px">Keterangan</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12" style="padding-left: 5px;">
        <div class="card mb-30" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px; margin-bottom: 15px; height:85vh">
          <div class="card-header d-flex justify-content-between align-items-center" style="margin-bottom: 0px;">
            <h3 style="text-align:center;width: 639px; padding-bottom: 1px;padding-top: 1px;"><strong>Task List</strong></h3>
          </div>

          <div class="card-body">
            <table class="table table-hover table-right table-sm" id="table-3" style=" height : 78vh">
              <thead>
                <tr class="border-keterangan table-info">
                  <th width="10px">No</th>
                  <th width="330px">Project Name</th>
                  <th width="60px">PIC</th>
                  <th width="80px">Deadline</th>
                  <th width="139px">Keterangan</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Footer End -->
    <!-- End Footer End -->
  </div>

  <div class="ui-layout-south ui-layout-pane ui-layout-pane-south" style="background-color:white;color:grey;border-bottom:5px solid white;position: absolute;margin: 0px;inset: auto 0px 0px;width: auto;z-index: 0;display: block;visibility: visible;padding-bottom: 1px;padding-top: 1px;">
    Copyright © 2022 PT Bank Rakyat Indonesia (Persero), Tbk. All rights reserved.
  </div>
  <!-- End Main Content Wrapper Area -->

  <!-- Table Pekerja Project -->
  <script>
    $(document).ready(function() {
      $.ajax({
        url: './get_grid_project.php',
        type: "GET",
        success: (result) => {
          result.forEach((element, index) => {

            // Menentukan Tanggal Saat Ini 
            var a = moment([new Date().getYear(), new Date().getMonth(), new Date().getDate()]);
            var b = moment([new Date(element.deadline).getYear(), new Date(element.deadline).getMonth(), new Date(element.deadline).getDate()]);
            var days = b.diff(a, 'days');

            // Kondisi warna
            var color = 'txt-black'
            if (days < 0) {
              color = 'txt-red'
            } else if (days == 0) {
              color = 'txt-yellow'
            } else if (days == 1) {
              color = 'txt-black'
            }

            //true & false
            var ckls = '';

            if (element.task == 1) {
              ckls = 'text-coret' //ini kan tercoret
            }

            // Menampilkan isi tabel 1
            var newRowContent = `
                            <tr class="isi_tabel" id="table_1_${index}" style="font-size:12px;">
                                <td><strong>${index+1}</strong></td>
                                <td class="${color} ${ckls} border-keterangan"><strong>${element.name_p}</strong></td>
                                <td class="${color} ${ckls} border-keterangan"><strong>${element.Name.split(' ')[0]}</strong></td>
                                <td class="${color} ${ckls} border-keterangan"><strong>${element.deadline}</strong></td>
                                <td class="border-keterangan"><strong>${element.status? element.status:''}</strong></td>
                            </tr>`
            $("#table-1 tbody").append(newRowContent);
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {},
        dataType: 'json'
      })
    });

    // checkbox
    function clickCheckbox(id) {
      var element = document.getElementById(id);
      if (element.classList.contains('text-coret')) {
        element.classList.remove("text-coret");
      } else {
        element.classList.add("text-coret");
      }
    }
  </script>

  <!-- Table 2 Comben -->
  <script>
    $(document).ready(function() {
      $.ajax({
        url: './get_grid_comben.php',
        type: "GET",
        success: (result) => {
          result.forEach((element, index) => {

            // Menentukan Tanggal Saat Ini
            var a = moment([new Date().getYear(), new Date().getMonth(), new Date().getDate()]);
            var b = moment([new Date(element.deadline).getYear(), new Date(element.deadline).getMonth(), new Date(element.deadline).getDate()]);
            var days = b.diff(a, 'days');

            // Kondisi warna
            var color = 'txt-black'
            if (days < 0) {
              color = 'txt-red'
            } else if (days == 0) {
              color = 'txt-yellow'
            } else if (days == 1) {
              color = 'txt-black'
            }

            //true & false
            var ckls = '';

            if (element.task == 1) {
              ckls = 'text-coret' //ini tercoret
            }

            // Menampilkan isi tabel 2
            var newRowContent = `
                            <tr class="isi_tabel" id="table_2_${index}" style="font-size:12px;">
                                <td><strong>${index+1}</strong></td>
                                <td class="${color} ${ckls} border-keterangan"><strong>${element.name_p}</strong></td>
                                <td class="${color} ${ckls} border-keterangan"><strong>${element.Name.split(' ')[0]}</strong></td>
                                <td class="${color} ${ckls} border-keterangan"><strong>${element.deadline}</strong></td>
                                <td class="border-keterangan"><strong>${element.status? element.status:''}</strong></td>
                            </tr>`
            $("#table-2 tbody").append(newRowContent);
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {},
        dataType: 'json'
      })
    });
  </script>

  <!-- Table 3 Task -->
  <script>
    $(document).ready(function() {
      $.ajax({
        url: './get_grid_task.php',
        type: "GET",
        success: (result) => {
          result.forEach((element, index) => {

            // Menentukan Tanggal Saat Ini 
            var a = moment([new Date().getYear(), new Date().getMonth(), new Date().getDate()]);
            var b = moment([new Date(element.deadline).getYear(), new Date(element.deadline).getMonth(), new Date(element.deadline).getDate()]);
            var days = b.diff(a, 'days');

            // Kondisi warna
            var color = 'txt-black'
            if (days < 0) {
              color = 'txt-red'
            } else if (days == 0) {
              color = 'txt-yellow'
            } else if (days == 1) {
              color = 'txt-black'
            }

            //true & false
            var ckls = '';

            if (element.task == 1) {
              ckls = 'text-coret' //ini kan tercoret
            }

            // Menampilkan isi tabel 3
            var newRowContent = `
                            <tr class="isi_tabel" id="table_3_${index}" style="font-size:12px;">
                            <td><strong>${index+1}</strong></td>
                            <td class="${color} ${ckls} border-keterangan"><strong>${element.name_p}</strong></td>
                            <td class="${color} ${ckls} border-keterangan"><strong>${element.Name.split(' ')[0]}</strong></td>
                            <td class="${color} ${ckls} border-keterangan"><strong>${element.deadline}</strong></td>
                            <td class="border-keterangan"><strong>${element.status? element.status:''}</strong></td>
                            </tr>`
            $("#table-3 tbody").append(newRowContent);
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {},
        dataType: 'json'
      })
    });
  </script>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


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

  <!-- jvectormap Min JS -->
  <script src="assets/js/jvectormap-1.2.2.min.js"></script>
  <!-- jvectormap World Mil JS -->
  <script src="assets/js/jvectormap-world-mill-en.js"></script>
  <!-- Custom JS -->
  <script src="assets/js/custom.js"></script>

</body>

</html>