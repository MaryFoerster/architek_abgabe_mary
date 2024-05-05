<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include 'head.php'
  ?>
  <title>Neues Projekt</title>
</head>
<body>

<?php include 'nav-Backend.php' ?>


<div class="container p-5">
  <div class="row">
    <div class="col-xl-6 flex-column p-2 d-flex justify-content-center align-items-center input-custom">
                <h2>Neues Projekt Hinzufügen</h2>
                <form method="POST" action="insert_arch_projekt.php" enctype="multipart/form-data">

                              <input class="m-3" id="name_projekt" placeholder="Name" type="text" name="name_projekt" required="">
                              <br>

                              <input class="m-3" id="subtitel_projekt" placeholder="Untertitel" type="text" name="subtitel_projekt" required="">
                              <br>

                              <input class="m-3" id="beschreibung_projekt" placeholder="Beschreibung" type="text" name="beschreibung_projekt" required="">
                              <br>

                              <input class="m-3" id="nutzflaeche_projekt" placeholder="Nutzfläche" type="text" name="nutzflaeche_projekt" required="">
                              <br>
    </div>

    <div class="col-xl-6 input-custom flex-column p-4 d-flex justify-content-center align-items-center">
                              <label for=""><strong>Planungsbeginn :</strong></label>
                              <br>
                              <input id="planungsbeginn_projekt" placeholder="planungsbeginn_projekt" type="date" name="planungsbeginn_projekt" required="">

                              <br>
                              <label for=""><strong>Fertigstellung :</strong></label>
                              <br>
                              <input id="fertigstellung_projekt" placeholder="fertigstellung_projekt" type="date"  name="fertigstellung_projekt" required="">

                              <br>
                              <input id="bauzeit_projekt" placeholder="Bauzeit" type="text"  name="bauzeit_projekt" required="">

                              <br>
                              <input id="foto_projekt" placeholder="Bild" type="file" name="foto_projekt" required="" accept="image/*">
                    
                              <br>

    </div>

    <div class="col-xl-12 flex-column p-5 d-flex justify-content-center align-items-center">
                            <button class="btn-custom" type="submit" name="submit" id="submit">Projekt Hinzufügen</button>
                </form>
    </div>
  </div>
</div>

<?php include 'footer-Backend.php' ?>

<script src="js/bootstrap.min.js"></script>
</body>
</html>