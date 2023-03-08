<?php

// exit
session_start();

unset($_SESSION["kb"]);
header('Location: ../login/index.php');
exit;

?>