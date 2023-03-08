<?php
include '../database.php';

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

$division = '';
if (isset($_SESSION['function'])) {
    $division = $_SESSION['function'];
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


    <title>Input Task PIC</title>

    <link rel="icon" type="image/png" href="assets/img/logoo.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                                <ul>
                                    <li><a class="dropdown-item" href="../manager/index.php">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="./tambah.php">Tambah Task</a></li>
                                    <li><a class="dropdown-item" href="../manager/pekerjaan_manager.php">Task</a></li>
                                    <li><a class="dropdown-item" href="../statistik/index.php">Statistik Kinerja</a></li>
                                    <!-- <li><a class="dropdown-item" href="javascript:history.go(-1)">Kembali</a></li> -->
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

                <!-- Statsitik Semua Function -->
                <div class="breadcrumb-area">
                    <h1>Silakan Isi Form Task Untuk PIC</h1>
                </div>

        <!-- Start -->
        <!-- <div class="row"> -->
            <!-- <div class="col-lg-12 col-md-12"> -->
                <!-- <div class="card mb-30"> -->
                    <?php
                    if ($division != '') {
                    ?>
                        <div class="div_retail mt-2">
                            <form action="./input-aksi.php" method="post" id="form-input">
                                <fieldset>
                                    <table id="tb_filter">
                                        <tbody>
                                            <tr>
                                                <th class="tcell" width="20%">
                                                    Personal Number / Nama
                                                </th>
                                                <td class="tcell2" width="40%">
                                                    <div class="d-flex flex-wrap">
                                                        <?php
                                                        $sql = "SELECT * FROM users where Function='" . $division . "'";
                                                        $result = mysqli_query($db, $sql);

                                                        while ($a = mysqli_fetch_array($result)) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input type="radio" class="mr-2" value="<?php echo $a['PN'] ?>" id="<?php echo $a['PN'] ?>" name="pic" required />
                                                                <label class="form-check-label" for="<?php echo $a['PN'] ?>">
                                                                    <?php echo $a['PN'] . ' - ' . $a['Name'] ?>
                                                                </label>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="tcell2" width="40%">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <div class="div_retail mt-2">
                                    <fieldset>
                                        <table id="tb_filter">
                                            <tbody>
                                                <tr>
                                                    <th class="tcell" width="20%">
                                                        Tipe Project
                                                    </th>
                                                    <td class="tcell2" width="40%">
                                                        <div class="form-check" style="align-items:center; display: flex;">
                                                            <input type="radio" class="mr-2" value="project" id="project" name="type_p" required />
                                                            <label class="form-check-label" for="project" style="margin-right: 15px; margin-left:5px">
                                                                Project
                                                            </label>
                                                            <input type="radio" class="mr-2" value="comben" id="comben" name="type_p" required/>
                                                            <label class="form-check-label" for="comben" style="margin-right: 15px; margin-left:5px">
                                                                Comben
                                                            </label>
                                                            <input type="radio" class="mr-2" value="task" id="task" name="type_p" required />
                                                            <label class="form-check-label" for="task" style="margin-right: 15px; margin-left:5px">
                                                                Task
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="tcell2" width="40%">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>

                                    <div class="div_retail mt-2">
                                        <fieldset>
                                            <table id="tb_filter">
                                                <tbody>
                                                    <tr>
                                                        <th class="tcell" width="20%">
                                                            Task Pekerja
                                                        </th>
                                                        <td class="tcell2" width="40%">
                                                            <input type="text" class="form-control form-control-sm" name="name_p" value="" placeholder="Tugas Untuk Pekerja" required>
                                                        </td>
                                                        <td class="tcell2" width="40%">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </fieldset>
                                    </div>
                                    <div class="div_retail mt-2">
                                        <from method="POST">
                                            <fieldset>
                                                <table id="tb_filter">
                                                    <tbody>
                                                        <tr>
                                                            <th class="tcell" width="20%">
                                                                Deadline Task
                                                            </th>
                                                            <td class="tcell2" width="40%">
                                                                <input type="date" class="form-control form-control-sm" name="deadline" value="" placeholder="Pilih tanggal" required>
                                                            </td>
                                                            <td class="tcell2" width="40%">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </fieldset>
                                        </from>
                                    </div>
                                    <div class="div_retail mt-2">
                                        <table id="tb_filter">
                                            <tbody>
                                                <tr>
                                                    <th class="tcell" width="20%">
                                                    </th>
                                                    <td class="tcell2" width="40%">
                                                        <input id="check" class="btn btn-primary" name="submit" type="submit" value="Simpan" title="Simpan">
                                                        <a class="btn btn-secondary" href="javascript:history.go(-1)">Kembali</a>
                                                    </td>
                                                    <td class="tcell2" width="40%">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
            <!-- </div> -->
                        <div class="mt-3">
                            <table id="tb_filter">
                                <tbody>
                                    <tr>
                                        <th class="tcell" width="20%">
                                        </th>
                                        <td class="tcell2" width="100%">
                                            <!-- <input id="check" class="button2" name="keluar" type="submit" value="keluar" title="keluar"> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                
                <!-- </div>
            </div> -->
        <!-- </div> -->

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
                    <td width="26px">${index+1}</td>
                    <td width="20px" class="${color}">${element.type_p}</td>
                    <td width="425px" class="${color}">${element.name_p}</td>
                    <td width="80px" class="${color}">${element.deadline}</td>
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

        <!--  -->
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    width: '100%'
                });
            });
        </script>

</body>

</html>