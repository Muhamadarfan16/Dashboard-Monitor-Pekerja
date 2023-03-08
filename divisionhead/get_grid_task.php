<?php
include '../database.php';
session_start();
$return_data = [];
if (isset($_SESSION['pn'])) {
  $query_mysql = mysqli_query($db, "SELECT * FROM hcis join users on users.PN=hcis.pic WHERE hcis.type_p = 'Task' and ((DATEDIFF(NOW(),ckls_task)<7 && task=1) or DATEDIFF(NOW(),ckls_task) is null) and hcis.created_by='".$_SESSION['pn']."' ORDER BY task ASC, deadline ASC;") or die(mysqli_error($db));
  while ($row = mysqli_fetch_array($query_mysql)) {
    $return_data[] = $row;
  }
}
header('Content-Type: application/json');
echo json_encode($return_data);
