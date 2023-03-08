<?php
session_start();

if (isset($_SESSION['kb'])) {
  $kb =  $_SESSION['kb'];
  if ($kb == 'Pekerja') {
    header("Location: ./pekerja");
  } else if ($kb == 'DH') {
    header("Location: ./divisionhead");
  } else if ($kb == 'HM') {
    header("Location: ./manager");
  }
} else {
  header("Location: ./login");
}
?>
