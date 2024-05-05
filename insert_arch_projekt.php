<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <title>Neues Projekt hinzugefügt</title>
</head>
<body>

<?php include 'nav-Backend.php'; ?>

<div class="container pt-5 pb-5 mt-5 mb-5">
    <div class="row">
        <div class="col-xl-12">
            <h3 class="mb-4">Neues Projekt Hinzufügen</h3>
            <?php
            if (isset($_POST['submit'])) {
                include 'db_connect.php';
                if ($conn) {
                    $name_projekt = $_POST['name_projekt'] ?? '';
                    $subtitel_projekt = $_POST['subtitel_projekt'] ?? '';
                    $beschreibung_projekt = $_POST['beschreibung_projekt'] ?? '';
                    $nutzflaeche_projekt = $_POST['nutzflaeche_projekt'] ?? '';
                    $planungsbeginn_projekt = $_POST['planungsbeginn_projekt'] ?? '';
                    $fertigstellung_projekt = $_POST['fertigstellung_projekt'] ?? '';
                    $bauzeit_projekt = $_POST['bauzeit_projekt'] ?? '';
                    
                    $filename = '';
                    if (isset($_FILES['foto_projekt']) && $_FILES['foto_projekt']['error'] === UPLOAD_ERR_OK) {
                        $filename = get_uploaded_file($_FILES['foto_projekt']['name'], $_FILES['foto_projekt']['tmp_name']);
                    } else {
                        echo "<p>Fehler beim Upload des Bildes.</p>";
                    }

                    $sql = "INSERT INTO arch_projekte_table (name_projekt, subtitel_projekt, beschreibung_projekt, nutzflaeche_projekt, planungsbeginn_projekt, fertigstellung_projekt, bauzeit_projekt, foto_projekt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, 'ssssssss', $name_projekt, $subtitel_projekt, $beschreibung_projekt, $nutzflaeche_projekt, $planungsbeginn_projekt, $fertigstellung_projekt, $bauzeit_projekt, $filename);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<h2>Das Neue Projekt :  $name_projekt wurde in der Datenbank Hinzugefügt ✅</h2>";
                    } else {
                        echo "<br><h2>Fehler beim Hinzufügen eines neues Projektes‼️</h2>";
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($conn);
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
        return ''; // Gibt einen leeren String zurück, falls der Upload fehlschlägt
    }
}
?>
