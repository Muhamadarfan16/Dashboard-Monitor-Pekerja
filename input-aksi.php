<?php 
include 'database.php';

$name_p = $_POST['name_p'];
$type_p = $_POST['type_p'];
$pic = $_POST['pic'];
$deadline = $_POST['deadline'];

$res = mysqli_query($db,"INSERT INTO hcis (name_p, type_p, pic, deadline, task, status) VALUES('$name_p','$type_p','$pic','$deadline','0','')") or die(mysqli_error($db));
$no = 1;

if($res){
  echo '<script>alert("Data berhasil disimpan!");window.location.href="index.php";</script>';
}else{
  echo '<script>alert("Terjadi kesalahan!");</script>';
}
?>