<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'head.php'
  ?>
  <title>Home</title>
</head>
<body>

<?php include 'nav.php' ?>


<div class="container header-bg mt-4">
  <div class="row">
    <div class="col-md-12 mt-5 mb-5 text-center">
      <h1 class="text-white pt-5 pb-5">ARCHITEK</h1>
    </div>
  </div>
</div>




  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12"><h2>Aktuelle Projekte</h2></div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            include 'db_connect.php';

            $aktuellesJahr = date("Y");
            $sql = "SELECT * FROM arch_projekte_table WHERE YEAR(fertigstellung_projekt) = ? ORDER BY RAND() LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $aktuellesJahr);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="mb-5 mt-5" style="width: 100%;">';
                    echo '<div class="row no-gutters">';
                    echo '<div class="col-md-6">';
                    echo '<img src="img/' . $row["foto_projekt"] . '" class="img-fluid" alt="Bild vom Projekt">';
                    echo '</div>';
                    echo '<div class="col-md-6 p-4"">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["name_projekt"] . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $row["subtitel_projekt"] . ' | ' . date("Y", strtotime($row["fertigstellung_projekt"])) . ' | ' . $row["stadt_projekt"] . '</h6>';
                    echo '<p class="card-text">' . $row["beschreibung_projekt"] . '</p>';
                    echo '<p class="card-text"><small class="text-muted">Nutzfläche: ca. ' . $row["nutzflaeche_projekt"] . ' m²</small></p>';
                    echo '<p class="card-text"><small class="text-muted">Planungsbeginn: ' . date("Y-m-d", strtotime($row["planungsbeginn_projekt"])) . '</small></p>';
                    echo '<p class="card-text"><small class="text-muted">Fertigstellung: ' . date("Y-m-d", strtotime($row["fertigstellung_projekt"])) . '</small></p>';
                    echo '<p class="card-text"><small class="text-muted">Bauzeit: ' . $row["bauzeit_projekt"] . '</small></p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 Ergebnisse";
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5 mb-5">
    </div>
  </div>
</div>


  <?php include 'footer.php' ?>




<script src="js/bootstrap.min.js"></script>
</body>
</html>
