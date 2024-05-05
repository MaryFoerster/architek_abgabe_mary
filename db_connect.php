<?php

if(strcmp($_SERVER['SERVER_NAME'], 'localhost') == 0) {
  $conn = mysqli_connect('localhost:8889', 'root', 'root') or die ("MySQL nicht gestartet");
  mysqli_set_charset($conn, 'utf8');
  mysqli_select_db($conn, 'arch_projekte');
}

