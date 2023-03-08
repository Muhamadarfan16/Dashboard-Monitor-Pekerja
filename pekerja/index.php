<?php
include '../database.php';
session_start();

if (isset($_SESSION['kb'])) {
  $kb =  $_SESSION['kb'];
  if ($kb == 'DH') {
    header("Location: ../divisionhead");
  } else if ($kb == 'HM') {
    header("Location: ../manager");
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

    <!-- Start Main Content Wrapper Area -->
    <div class="main-content">

        <!-- Navbar -->
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

                <form class="nav-search-form d-none ml-auto d-md-block">
                </form>

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

        <!-- Header Function -->
        <div class="welcome-area">
            <div class="row m-0 align-items-center">
                <div class="col-lg-5 col-md-12 p-0">
                    <div class="welcome-content">
                        <h1 class="mb-2">
                            <?php 
                                echo $_SESSION['function'];
                            ?> !
                        </h1>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12 p-0">
                    <div class="welcome-img">
                        <img src="assets/img/welcome-img.png" alt="image">
                    </div>
                </div>

            </div>
        </div>

        <div class="table-responsive-xl tablesize">
            <table class="table table-hover" id="pekerja">
            <thead class="bg-primary text-white">
                <tr>
                <th width="10px">No.</th>
                <th width="110px">Project Name</th>
                <th width="250px">Nama Program</th>
                <!-- <th width="25px">PIC</th> -->
                <th width="87px">Deadline</th>
                <th width="30px">Done</th>
                <th width="100px">Keterangan</th>
                <th width="10px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>

        <!-- Start Footer End -->
        <footer class="footer-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <p>Copyright <i class='bx bx-copyright'></i> 2022 <a href="#">PT. Bank Rakyat Indoneisa</a></p>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 text-right">
                    <!-- <p>Designed by ❤️ <a href="https://bristarts/" target="_blank">HCIS</a></p> -->
                </div>
            </div>
        </footer>
        <!-- End Footer End -->
    </div>
    <!-- End Main Content Wrapper Area -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script>
    $(document).ready(function() {
        $.ajax({
        url: './get_grid_pekerja.php',
        type: "GET",
        success: (result) => {
            result.forEach((element, index) => {

            // Menentukan Tanggal deadline Saat Ini (selisih hari ini dengan deadline)
            var a = moment([new Date().getYear(), new Date().getMonth(), new Date().getDate()]);
            var b = moment([new Date(element.deadline).getYear(), new Date(element.deadline).getMonth(), new Date(element.deadline).getDate()]);
            var days = b.diff(a, 'days');

            // Kondisi
            var color = 'txt-black'
            if (days < 0) {
                color = 'txt-red'
            } else if (days == 0) {
                color = 'txt-red'
            } else if (days == 1) {
                color = 'txt-yellow'
            }

            // Jika di ckls akan tercoret
            var ckls = '';

            if (element.task == 1) {
                var ckls = 'text-coret' //ini kan tercoret
                color = 'txt-red' // tercoret
            }

            var newRowContent = `
                <tr class="isi_tabel ${ckls}" id="pekerja_1_${index}">
                    <td width="26px"><strong>${index+1}</strong></td>
                    <td width="20px" class="${color}"><strong>${element.type_p}</strong></td>
                    <td width="425px" class="${color}"><strong>${element.name_p}</strong></td>
                    <td width="80px" class="${color}"><strong>${element.deadline}</strong></td>
                    <td width="30px">
                    <form method="post" id="form-input-${index}" action="input-aksi-pekerja.php">
                        <input type="checkbox" class="check" name="done" onchange="clickCheckbox('pekerja_1_'+${index})" value="1" ${element.task == 1? 'checked':''} />
                    </form>
                    </td>
                    <td width="100px">
                    <input form="form-input-${index}" type="text" id="status" name="status" value="${element.status? element.status : ''}" />
                    </td>
                    <input form="form-input-${index}" type="hidden" name="id" value="${element.id}">
                    <td width="10px">
                    <input type="submit"  form="form-input-${index}">
                    </td>
                </tr>`

            $("#pekerja tbody").append(newRowContent);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {},
        dataType: 'json'
        })
    });

    // CheckBox 
    function clickCheckbox(id) {
        var element = document.getElementById(id);
        if (element.classList.contains('text-coret')) {
        element.classList.remove("text-coret");
        // element.value = 1
        } else {
        // element.value = 0
        element.classList.add("text-coret");
        }
    }
    </script>

    <!-- tombol simpan -->
    <script type="text/javascript">
    function sweet() {
        alert("Data Berhasil di Input", "You clicked the button!", "success");
    }
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