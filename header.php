<div class="ui-layout-north ui-layout-pane ui-layout-pane-north" style="margin: 0px;inset: 0px 0px auto;width: auto;z-index: 0;height: 100%;display: block;visibility: visible;padding-top: 5px;padding-bottom: 8px;">
    <div id="header">DASHBOARD KERJA <?php echo $_SESSION['function']; ?></div>
    <div id="pane-breadcrumb" style="padding-bottom: 0px;">
        <div id="box-logout">
            <a id="logout" href="../logout/logout.php" title="Klik di sini untuk keluar dari aplikasi" style="color:#FF0000;font-weight:bold;text-decoration:none;"> Statistik Function
            </a>
        </div>
        <div id="user-info">
            Selamat Datang (<?php echo $_SESSION['nm']; ?>)
        </div>
        <div id="date-info">

        </div>
    </div>
</div>

<script>
    var interval = 1000;
    setInterval(function() {
        moment.locale('id')
        $('#date-info').text(moment().format('dddd, Do MMMM YYYY h:mm:ss'))
    }, interval);
</script>