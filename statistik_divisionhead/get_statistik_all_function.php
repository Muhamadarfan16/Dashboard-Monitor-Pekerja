<?php
include '../database.php';

session_start();
$division = '';
if (isset($_SESSION['function'])) {
  $division = $_SESSION['function'];
}

$return_data = [];
if (isset($_SESSION['pn'])) {
  $query_mysql = mysqli_query($db, "SELECT users.function, COUNT(*) as total_task, COUNT(CASE WHEN hcis.task = 1 THEN 1 ELSE null END) as total_done FROM users LEFT JOIN hcis on hcis.pic=users.PN GROUP BY users.Function ORDER BY function ASC;") or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($query_mysql)) {
    $return_data[] = $row;
  }
}
header('Content-Type: application/json');
echo json_encode($return_data);
