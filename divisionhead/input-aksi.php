<?php 
include '../database.php';

session_start();
$name_p = $_POST['name_p'];
$type_p = $_POST['type_p'];
$pic = $_POST['pic'];
$deadline = $_POST['deadline'];
$created_by = $_SESSION['pn'];

$res = mysqli_query($db,"INSERT INTO hcis (name_p, type_p, pic, deadline, task, status, created_by) VALUES('$name_p','$type_p','$pic','$deadline','0','','$created_by')") or die(mysqli_error($db));
$no = 1;

if($res){
  echo '<script>alert("Data berhasil disimpan!");window.location.href="index.php";</script>';
}else{
  echo '<script>alert("Terjadi kesalahan!");</script>';
}
?>