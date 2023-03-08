<?php
include '../database.php';

$id = $_POST['id'];
$done =  isset($_POST['done']) && $_POST['done'] == 1? $_POST['done'] : 0;
$status = $_POST['status'];
$ckls_task = date("Y-m-d");

// jika di ckls akan 
if($done == 1){
    $ckls_task = date('Y-m-d');
}else{
    $ckls_task = '';
}



$dt = mysqli_query($db, "update hcis set task='$done', status='$status', ckls_task='$ckls_task' where id='$id'");

if ($dt) {
    echo "Data Telah di Update";
} else {
    echo "data gagal diupdate ";
}

header("location:index.php");
