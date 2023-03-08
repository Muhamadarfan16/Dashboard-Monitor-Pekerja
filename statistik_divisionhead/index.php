<?php
include '../database.php';
session_start();

if (isset($_SESSION['kb'])) {
    $kb =  $_SESSION['kb'];
    if ($kb == 'Pekerja') {
        header("Location: ../pekerja");
    } else if ($kb == 'HM') {
        header("Location: ../manager");
    }
} else {
    header("Location: ../login");
}

$division = '';
if (isset($_POST['division'])) {
    $division = $_POST['division'];
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
    <!-- apex -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@2.2.1"></script>


    <title>Statistik Pekerja HCBP</title>

    <link rel="icon" type="image/png" href="assets/img/logoo.png">
</head>

<body>

    <!-- Start Main Content Wrapper Area -->
    <div class="main-content">

        <!-- Navbar -->
        <nav class="navbar top-navbar navbar-expand" style="width:100%;left:0">
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
                                <span class="name">Hi!
                                    <?php
                                    echo $_SESSION['nm'];
                                    ?>
                                </span>
                            </div>
                        </a>

                        <div class="dropdown-menu">
                            <!-- <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="info text-center">
                                    <span class="name">Nama PIC</span>
                                    <p class="mb-3">Jabatan PIC</p>
                                </div>
                            </div> -->

                            <div class="dropdown-footer">
                                <ul>
                                    <li><a class="dropdown-item" href="../divisionhead/index.php">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="../divisionhead/tambah.php">Tambah Task</a></li>
                                    <!-- <li><a class="dropdown-item" href="../manager/pekerjaan_manager.php">Task</a></li> -->
                                    <li><a class="dropdown-item" href="../statistik_divisionhead/index.php">Statistik Kinerja</a></li>
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
                        <h1 class="mb-2">Human Capital Business Partner Division!</h1>
                        <!-- <p class="mb-0">Human Capital Informatioon System</p> -->
                        <!-- <p class="mb-2">Human Capital Informatioon System</p> -->
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
        <!-- <div class="breadcrumb-area">
            <h1>Statistics ALL Function</h1>
        </div> -->

        <!-- Bar Multiple -->
        <!-- <div class="card mb-30">
            <div class="card-body">
                <div id="chart1"></div>
            </div>
        </div> -->

        <!-- Start -->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card mb-30">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Statistics ALL Function</h3>
                    </div>

                    <div class="card-body widget-todo-list">
                        <div id="chart1"></div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card mb-30">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Day</h3>
                    </div>

                    <div class="card-body widget-todo-list">
                        <!-- <div id="world-map-markers"></div> -->
                        <div class="new-product-box sub-text d-block font-weight-bold">
                            <?php
                            $date1 = date_create();
                            $date2 = date_create("2022-01-01");
                            $diff = date_diff($date1, $date2);
                            echo $diff->format("%m Month %d Day");
                            ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-30">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Today Task</h3>
                    </div>

                    <div class="card-body widget-todo-list">
                        <div id="apex-radialbars-with-image"></div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End -->

        <!-- Start -->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- <div class="card mb-30">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Human Capital Business Partner Division</h3>
                    </div>

                    <div class="card-body widget-todo-list">
                        <div id="apex-radialbar-gradient-circle-chart"></div>
                    </div>

                </div> -->
            </div>

            <div class="col-lg-4 col-md-12">
                <!-- <div class="card mb-30">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Day</h3>
                    </div>

                    <div class="card-body widget-todo-list">
                        <div class="new-product-box sub-text d-block font-weight-bold">
                            <?php
                            $date1 = date_create();
                            $date2 = date_create("2022-01-01");
                            $diff = date_diff($date1, $date2);
                            echo $diff->format("%m Month %d Day");
                            ?>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="card mb-30">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Today Task</h3>
                    </div>

                    <div class="card-body widget-todo-list">
                        <div id="apex-radialbars-with-image"></div>
                    </div>
                </div> -->

            </div>
        </div>
        <!-- End -->

        <!-- Start -->
        <div class="breadcrumb-area">
            <h1>Basic Bar Progress PIC</h1>
        </div>

        <!-- Tabel -->
        <div class="table-responsive-xl tablesize">
            <table class="table table-hover" id="pekerja">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="text-align:center; width:5px;">No.</th>
                        <th width="80px">Personal Number</th>
                        <th width="150px">Nama</th>
                        <th width="100px">Jabatan</th>
                        <th width="250px">Task Bar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <!-- Line -->
        <div class="flex-grow-1">
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

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Vendors Min JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- ApexCharts JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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

    <!-- Statistik FUNCTION -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: './get_statistik_all.php',
                type: "GET",
                success: (result) => {
                    if (document.getElementById("apex-radialbar-gradient-circle-chart")) {
                        const max = result[0]?.total_task || 0

                        function valueToPercent(value) {
                            return ((parseInt(value) * 100) / parseInt(max)).toFixed(0)
                        }

                        var options = {
                            chart: {
                                height: 400,
                                type: 'radialBar',
                                toolbar: {
                                    show: true
                                }
                            },
                            plotOptions: {
                                radialBar: {
                                    startAngle: -135,
                                    endAngle: 225,
                                    hollow: {
                                        margin: 0,
                                        size: '70%',
                                        background: '#fff',
                                        image: undefined,
                                        imageOffsetX: 0,
                                        imageOffsetY: 0,
                                        position: 'front',
                                        dropShadow: {
                                            enabled: true,
                                            top: 3,
                                            left: 0,
                                            blur: 4,
                                            opacity: 0.24
                                        }
                                    },
                                    track: {
                                        background: '#fff',
                                        strokeWidth: '67%',
                                        margin: 0, // margin is in pixels
                                        dropShadow: {
                                            enabled: true,
                                            top: -3,
                                            left: 0,
                                            blur: 4,
                                            opacity: 0.35
                                        }
                                    },

                                    dataLabels: {
                                        showOn: 'always',
                                        name: {
                                            offsetY: -10,
                                            show: true,
                                            color: '#888',
                                            fontSize: '17px'
                                        },
                                        value: {
                                            formatter: function(val) {
                                                return parseInt(val);
                                            },
                                            color: '#111',
                                            fontSize: '36px',
                                            show: true,
                                        }
                                    }
                                }
                            },
                            fill: {
                                type: 'solid',
                                colors: [function({
                                    value,
                                    seriesIndex,
                                    w
                                }) {
                                    if (value < 60) {
                                        return '#e5405e'
                                    } else if (value >= 60 && value < 80) {
                                        return '#ffdb3a'
                                    } else {
                                        return '#3fffa2'
                                    }
                                }]
                                // type: 'gradient',
                                // gradient: {
                                //     shade: 'light',
                                //     // type: 'horizontal',
                                //     shadeIntensity: 0.5,
                                //     inverseColors: true,
                                //     opacityFrom: 1,
                                //     opacityTo: 1,
                                //     colorStops: [{
                                //             offset: 0,
                                //             color: "#e5405e",
                                //             opacity: 1
                                //         },
                                //         {
                                //             offset: 45,
                                //             color: "#ffdb3a",
                                //             opacity: 1
                                //         },
                                //         {
                                //             offset: 100,
                                //             color: "#3fffa2",
                                //             opacity: 1
                                //         }
                                //     ]
                                // }
                            },
                            series: [valueToPercent(result[0]?.total_done || 0)],
                            stroke: {
                                lineCap: 'round'
                            },
                            labels: ['Percent'],
                        }
                        var chart = new ApexCharts(
                            document.querySelector("#apex-radialbar-gradient-circle-chart"),
                            options
                        );
                        chart.render();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {},
                dataType: 'json'
            })
        });
    </script>

    <!-- Progress PIC -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: './get_statistik_all_pn.php',
                type: "GET",
                success: (result) => {
                    let categories = result.map((item) => item.Name)
                    let series = result.map((item) => item.total_task)
                    if (document.getElementById("apex-column-with-data-labels")) {
                        var options = {
                            chart: {
                                height: 500,
                                type: 'bar',
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        position: 'top', // top, center, bottom
                                    },
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                formatter: function(val) {
                                    return parseInt(val);
                                },
                                offsetY: -20,
                                style: {
                                    fontSize: '12px',
                                    colors: ["#304758"]
                                }
                            },
                            series: [{
                                name: 'Total Task',
                                data: series
                            }],
                            xaxis: {
                                categories,
                                position: 'top',
                                labels: {
                                    offsetY: -18,

                                },
                                axisBorder: {
                                    show: false
                                },
                                axisTicks: {
                                    show: false
                                },
                                crosshairs: {
                                    fill: {
                                        type: 'gradient',
                                        gradient: {
                                            colorFrom: '#D8E3F0',
                                            colorTo: '#BED1E6',
                                            stops: [0, 100],
                                            opacityFrom: 0.4,
                                            opacityTo: 0.5,
                                        }
                                    }
                                },
                                tooltip: {
                                    enabled: true,
                                    offsetY: -35,

                                }
                            },
                            fill: {
                                gradient: {
                                    shade: 'light',
                                    type: "horizontal",
                                    shadeIntensity: 0.25,
                                    gradientToColors: undefined,
                                    inverseColors: true,
                                    opacityFrom: 1,
                                    opacityTo: 1,
                                    stops: [50, 0, 100, 100]
                                },
                            },
                            yaxis: {
                                axisBorder: {
                                    show: false
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    show: false,
                                    formatter: function(val) {
                                        return parseInt(val);
                                    }
                                }

                            },
                            // title: {
                            //     text: 'TOTAL TASK',
                            //     floating: true,
                            //     offsetY: 335,
                            //     align: 'center',
                            //     style: {
                            //         color: '#444'
                            //     }
                            // },
                            legend: {
                                offsetY: -10,
                            },
                        }
                        var chart = new ApexCharts(
                            document.querySelector("#apex-column-with-data-labels"),
                            options
                        );
                        chart.render();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {},
                dataType: 'json'
            })
        });
    </script>

    <!-- Task Today -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: './get_statistik_today.php',
                type: "GET",
                success: (result) => {
                    if (document.getElementById("apex-radialbars-with-image")) {
                        const max = result[0]?.total_today || 0

                        function valueToPercent(value) {
                            return (parseInt(value) * 100) / parseInt(max)
                        }
                        var options = {
                            chart: {
                                height: 350,
                                type: 'radialBar',
                            },
                            fill: {
                                type: 'image',
                                // image: {
                                //     src: ['assets/img/slider/1.jpg'],
                                // }
                            },
                            plotOptions: {
                                radialBar: {
                                    dataLabels: {
                                        value: {
                                            formatter: function(val) {
                                                // return parseInt(val)+'%';
                                                return `${result[0]?.total_done}/${result[0]?.total_today}`;
                                            },
                                            color: '#111',
                                            fontSize: '36px',
                                            show: true,
                                        }
                                    }
                                }
                            },
                            series: [valueToPercent(result[0]?.total_done || 0)],
                            stroke: {
                                lineCap: 'round'
                            },
                            // labels: [`Task Today ${result[0]?.total_done}/${result[0]?.total_today}`],
                            labels: ['Task Today'],

                        }
                        var chart = new ApexCharts(
                            document.querySelector("#apex-radialbars-with-image"),
                            options
                        );
                        chart.render();
                    }
                    // Untuk Task yang sudah selesai dengan task keseluruhan per PN
                    // <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                    // aria-valuenow="${element.total_done}" aria-valuemin="0" aria-valuemax="${element.total_task}" 
                    // style="width:${element.total_done / element.total_task * 100}%">
                    // </div>
                },
                error: function(jqXHR, textStatus, errorThrown) {},
                dataType: 'json'
            })
        });
    </script>

    <!-- Script For Table Bar Progress PIC -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: './get_statistik.php',
                type: "GET",
                success: (result) => {
                    result.forEach((element, index) => {

                        var newRowContent = `
                        <tr class="isi_tabel" id="pekerja_1_${index}">
                            <td style="text-align:center; width:5px;">${index+1}</td>
                            <td styletext-align:center; width:5px;">${element.PN}</td>
                            <td width="150px">${element.Name}</td>
                            <td width="150px">${element.Jabatan}</td>
                            <td width="250px">
                            <div id="progress-bar-container">
                                <div class="progress-bar-child progress" style="justify-content:center; color:black !important"></div>
                                <div class="progress-bar-child shrinker timelapse" style="width:${100-(parseInt(element.total_done) / parseInt(element.total_task) * 100)}%"></div>
                                <div style="font-size: 12px;text-align: center;position: absolute;top: 0;left: 50%;right:50%;">${isNaN(parseInt(element.total_done || 0) / parseInt(element.total_task || 0) * 100)? 0 : (parseInt(element.total_done || 0) / parseInt(element.total_task || 0) * 100).toFixed(2)}%</div>
                            </div>
                            </td>
                        </tr>`

                        $("#pekerja tbody").append(newRowContent);
                    });

                    // per 100 %
                    //<div class="progress">
                    //<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                    //aria-valuenow="${element.total_done}" aria-valuemin="0" aria-valuemax="100" 
                    //style="width:${parseInt(element.total_done) / 100 * 100}%"> ${parseInt(element.total_done)   / 100 * 100}%
                    //</div>
                    //</div>
                },
                error: function(jqXHR, textStatus, errorThrown) {},
                dataType: 'json'
            })
        });
    </script>

    <!-- Script Statsitsic All Functioon Multiple -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: './get_statistik_all_pn.php',
                type: "GET",
                success: (result) => {
                    let categories = result.map((item) => item.Name)
                    let series = result.map((item) => item.total_task)
                    if (document.getElementById("apex-column-with-data-labels")) {
                        var options = {
                            chart: {
                                height: 500,
                                type: 'bar',
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        position: 'top', // top, center, bottom
                                    },
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                formatter: function(val) {
                                    return parseInt(val);
                                },
                                offsetY: -20,
                                style: {
                                    fontSize: '12px',
                                    colors: ["#304758"]
                                }
                            },
                            series: [{
                                name: 'Total Task',
                                data: series
                            }],
                            xaxis: {
                                categories,
                                position: 'top',
                                labels: {
                                    offsetY: -18,

                                },
                                axisBorder: {
                                    show: false
                                },
                                axisTicks: {
                                    show: false
                                },
                                crosshairs: {
                                    fill: {
                                        type: 'gradient',
                                        gradient: {
                                            colorFrom: '#D8E3F0',
                                            colorTo: '#BED1E6',
                                            stops: [0, 100],
                                            opacityFrom: 0.4,
                                            opacityTo: 0.5,
                                        }
                                    }
                                },
                                tooltip: {
                                    enabled: true,
                                    offsetY: -35,

                                }
                            },
                            fill: {
                                gradient: {
                                    shade: 'light',
                                    type: "horizontal",
                                    shadeIntensity: 0.25,
                                    gradientToColors: undefined,
                                    inverseColors: true,
                                    opacityFrom: 1,
                                    opacityTo: 1,
                                    stops: [50, 0, 100, 100]
                                },
                            },
                            yaxis: {
                                axisBorder: {
                                    show: false
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    show: false,
                                    formatter: function(val) {
                                        return parseInt(val);
                                    }
                                }

                            },
                            // title: {
                            //     text: 'TOTAL TASK',
                            //     floating: true,
                            //     offsetY: 335,
                            //     align: 'center',
                            //     style: {
                            //         color: '#444'
                            //     }
                            // },
                            legend: {
                                offsetY: -10,
                            },
                        }
                        var chart = new ApexCharts(
                            document.querySelector("#apex-column-with-data-labels"),
                            options
                        );
                        chart.render();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {},
                dataType: 'json'
            })
        });
    </script>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: './get_statistik_all_function.php',
                type: "GET",
                success: (result) => {
                    let max = result.reduce((prev, curr) => prev + parseInt(curr.total_done), 0)
                    let series = result.map(item => parseInt((parseInt((parseInt(item.total_done) * 100) / parseInt(item.total_task))).toFixed(0)))
                    let labels = result.map(item => item.function)
                    console.log(result, series)
                    var options = {
                        series,
                        chart: {
                            height: 350,
                            type: 'radialBar',
                        },
                        plotOptions: {
                            radialBar: {
                                dataLabels: {
                                    name: {
                                        fontSize: '14px',
                                    },
                                    value: {
                                        fontSize: '16px',
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: function(val) {
                                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                            let total = parseInt(val.config.series.reduce((prev, curr) => prev + curr, 0) / val.config.series.length)
                                            return `${total}%`
                                        }
                                    }
                                }
                            }
                        },
                        labels,
                    };
                    var chart = new ApexCharts(document.querySelector("#chart1"), options);
                    chart.render();
                }
            })
        })
    </script>



</body>

</html>