<?php
include '../database.php';

session_start();
$division = '';
if (isset($_SESSION['function'])) {
  $division = $_SESSION['function'];
}

$return_data = [];
if (isset($_SESSION['pn'])) {
  $query_mysql = mysqli_query($db, "SELECT count(*) as total_today, count(CASE WHEN h.task=1 THEN 1 ELSE null END) AS total_done FROM hcis h 
  JOIN users u on u.PN=h.pic /*WHERE Function='$division'*/ and deadline = CURRENT_DATE") or die(mysqli_error($db));
  // $query_mysql = mysqli_query($db, "SELECT count(*) as total_task, count(CASE WHEN task=1 THEN 1 ELSE 0 END) as total_done FROM hcis h
  // JOIN users u on u.PN=h.pic 
  // WHERE Function='$division'") or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($query_mysql)) {
    $return_data[] = $row;
  }
}
header('Content-Type: application/json');
echo json_encode($return_data);
