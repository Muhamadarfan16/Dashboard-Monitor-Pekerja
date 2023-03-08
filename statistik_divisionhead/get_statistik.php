<?php
include '../database.php';

session_start();
$division = '';
if (isset($_SESSION['function'])) {
  $division = $_SESSION['function'];
}

$return_data = [];
if (isset($_SESSION['pn'])) {
  $query_mysql = mysqli_query($db, "SELECT PN, Name, Jabatan,
    (Select count(*) from hcis where pic=users.PN) as total_task, 
    (Select count(*) from hcis where pic=users.PN and task='1') as total_done
    FROM users /*WHERE function ='$division'*/ ORDER BY PN ASC;") or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($query_mysql)) {
    $return_data[] = $row;
  }
}
header('Content-Type: application/json');
echo json_encode($return_data);
