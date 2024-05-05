
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'head.php'
  ?>
  <title>Passwort</title>
</head>
<body>

<?php include 'nav.php' ?>

<div class="container">
  <div class="row">

    <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center p-5">
        <h1 class="p-3">Passwort</h1>
        <?php
        // Zeige das Login-Formular, wenn nicht eingeloggt
        if (!isset($_SESSION['loggedin'])):
            if (!empty($error)):
                echo "<p>$error</p>"; // Zeige Fehlermeldung, wenn vorhanden
            endif;
        ?>
        <form class="input-custom p-4" action="" method="post">
            <div class="p-2">
                <input type="text" placeholder="Benutzername" name="username"><br>
            </div>
            <div class="p-2">
                <input type="password" placeholder="Passwort"  name="password"><br>
            </div>
            <div class="p-2">
            <input type="submit" value="Einloggen" class="btn-custom">
            </div>
        </form>
        <?php endif; ?>
    </div>

  </div>
</div>

<?php include 'footer.php' ?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php
session_start(); // Starte die Session am Anfang des Skripts

include 'db_connect.php'; // Datenbankverbindung

// Festgelegter Benutzername und Passwort
$myUsername = 'mary';
$myPassword = '1234';

$error = ''; // Initialisiere die Fehlermeldung

// Überprüfe, ob das Formular gesendet wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Überprüfe, ob Benutzername und Passwort korrekt sind
    if ($_POST['username'] === $myUsername && $_POST['password'] === $myPassword) {
        // Authentifizierung erfolgreich
        $_SESSION['loggedin'] = true;
        header('Location: arch_projekt_liste_edit.php'); // Weiterleitung zur geschützten Seite
        exit;
    } else {
        // Authentifizierung fehlgeschlagen
        $error = 'Falscher Benutzername oder Passwort!';
    }
}


?>