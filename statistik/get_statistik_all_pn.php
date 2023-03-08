<?php
include '../database.php';

session_start();
$division = '';
if (isset($_SESSION['function'])) {
  $division = $_SESSION['function'];
}

$return_data = [];
if (isset($_SESSION['pn'])) {
  $query_mysql = mysqli_query($db, "SELECT Name, count(case WHEN h.type_p='Project' THEN 1 ELSE null END) as total_project, count(case WHEN h.type_p='Comben' THEN 1 ELSE null END) as total_comben,count(case WHEN h.type_p='Task' THEN 1 ELSE null END) as total_task 
  FROM users u LEFT JOIN hcis h on h.pic=u.PN WHERE u.Function='$division' 
  GROUP BY u.Name ORDER BY u.Name ASC") or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($query_mysql)) {
    $return_data[] = $row;
  }
}
header('Content-Type: application/json');
echo json_encode($return_data);
