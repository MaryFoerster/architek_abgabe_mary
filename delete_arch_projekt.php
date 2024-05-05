<!DOCTYPE html>
<html lang="en">
<head>

<?php
  include 'head.php'
  ?>
  
  <title>Projekt Gelöscht</title>
</head>
<body>
<?php include 'nav-Backend.php' ?>


<div class="container mt-5 mb-5 pt-5 pb-5">
  <div class="row">
    <div class="col-xl-12">
      



          <h2>Projekt Löschen</h2>
          <br>

          <?php

            include 'db_connect.php';
            if ($conn) {
              $id_arch_projekt = $_GET['id'];


              $sql = "DELETE FROM `arch_projekte` . `arch_projekte_table` WHERE (`id_arch_projekt` = '$id_arch_projekt')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                  echo "<h2>Das Projekt $id_arch_projekt wurde erfolgreich gelöscht ✅</h2>";
                } else {
                  echo "<h2>Fehler beim Löschen des Projektes !!!!</h2>";
                }
            }

            ?>

    </div>
  </div>
</div>

<div class="container mt-5 mb-5 pt-5 pb-5">
  <div class="row">
    <div class="col-md-12 mt-5 mb-5">
    </div>
  </div>
</div>

<?php include 'footer-Backend.php' ?>

<script src="js/bootstrap.min.js"></script>
</body>
</html>