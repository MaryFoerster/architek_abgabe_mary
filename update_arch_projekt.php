<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
<title>Projekt Ändern</title>
</head>
<body>

<?php include 'nav-Backend.php'; ?>

<div class="container mt-5 mb-5 pt-5 pb-5">
  <div class="row">
    <div class="col-xl-12">
      <h2>Projekt Ändern</h2>
      <br>
      <?php
      include 'db_connect.php';
      if ($conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $id_arch_projekt = isset($_GET['id']) ? intval($_GET['id']) : 0;

          if ($id_arch_projekt > 0) {
            // Handling File Upload
            $filename = $_POST['foto_projekt'];  // Fallback if no file is uploaded
            if (isset($_FILES['foto_projekt']) && $_FILES['foto_projekt']['error'] == UPLOAD_ERR_OK) {
              $filename = get_uploaded_file($_FILES['foto_projekt']['name'], $_FILES['foto_projekt']['tmp_name']);
            }

            $stmt = $conn->prepare("UPDATE arch_projekte_table SET 
              name_projekt = ?, 
              subtitel_projekt = ?, 
              beschreibung_projekt = ?, 
              nutzflaeche_projekt = ?, 
              planungsbeginn_projekt = ?, 
              fertigstellung_projekt = ?, 
              bauzeit_projekt = ?, 
              foto_projekt = ? WHERE id_arch_projekt = ?");
            $stmt->bind_param("ssssssssi", 
              $_POST['name_projekt'], 
              $_POST['subtitel_projekt'], 
              $_POST['beschreibung_projekt'], 
              $_POST['nutzflaeche_projekt'], 
              $_POST['planungsbeginn_projekt'], 
              $_POST['fertigstellung_projekt'], 
              $_POST['bauzeit_projekt'], 
              $filename, 
              $id_arch_projekt);

            if ($stmt->execute()) {
              echo "<h2>Das Projekt $id_arch_projekt wurde erfolgreich geändert ✅</h2>";
            } else {
              echo "<h2>Fehler beim Ändern des Projekts !!!!</h2>";
            }
            $stmt->close();
          } else {
            echo "<h2>Ungültige Projekt-ID.</h2>";
          }
        }
      } else {
        echo "<h2>Keine Verbindung zur Datenbank möglich.</h2>";
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

<?php include 'footer-Backend.php'; ?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
function get_uploaded_file($file, $tmp_file) {
  $newName = time() . '_' . $file;
  $destination = 'img/' . $newName;
  if (move_uploaded_file($tmp_file, $destination)) {
    return $newName;
  } else {
    return ''; // Returns an empty string if upload fails
  }
}
?>
