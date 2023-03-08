<?php
include '../database.php';
session_start();
 
if (isset($_SESSION['kb'])) {
  $kb =  $_SESSION['kb'];
  if($kb=='Pekerja'){
    header("Location: ../pekerja");
  }else if($kb=='DH'){
    header("Location: ../divisionhead");
  }else if($kb=='HM'){
    header("Location: ../manager");
  }
}

// if (isset($_POST['submit'])) {
    $pn = $_POST['pn'];
    // echo $pn;
    // $password = md5($_POST['password']);
    $password = $_POST['pw'];
    // echo $password;
    
    // login dan cek, jika data susai dengan tugasnya maka bisa melakukan pengiriman tugas
    $sql = "SELECT * FROM users WHERE PN='$pn' AND Password='$password'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    // echo $result;
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['pn'] = $row['PN'];
        $_SESSION['nm'] = $row['Name'];
        $_SESSION['kb'] = $row['KB'];
        $_SESSION['function'] = $row['Function'];
        session_start();
        $kb =  $row['KB'];
        if($kb=='Pekerja'){
            // echo "berhasil";
          header("Location: ../pekerja");
        }else if($kb=='DH'){
            // echo "berhasil";
          header("Location: ../divisionhead/index.php");
        }else if($kb=='HM'){
            // echo "berhasil";
          header("Location: ../manager");
        }
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
// }
?>