<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include 'head.php';
  ?>
  <title>edit</title>
</head>
<body>

<?php include 'nav-Backend.php' ?>

  <?php
  include 'db_connect.php';
    if ($conn) {
      $id_arch_projekt = $_GET['id'];

      $sql = "SELECT * FROM arch_projekte WHERE arch_projekte_table = " . $id_arch_projekt;

      $result = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($result);

      extract($row);

      mysqli_close($conn);

    }
  ?>


<div class="container p-5">
    <div class="row">
      <div class="col-xl-6 flex-column p-2 d-flex justify-content-center align-items-center input-custom">

        <h1>Projekt Bearbeiten</h1>
                <form method="POST" action="update_arch_projekt.php?id=<?php echo $id_arch_projekt ?>" enctype="multipart/form-data">
                                <input class="m-3" id="name_projekt" placeholder="Name" type="text" name="name_projekt" required="" value="<?php echo $name_projekt; ?>">
                                <br>         
                                <input class="m-3" id="subtitel_projekt
                                " placeholder="Untertitel" type="text" name="subtitel_projekt
                                " required="" value="<?php echo $subtitel_projekt
                                ; ?>">
                                <br>  
                                <input class="m-3" id="beschreibung_projekt" placeholder="Beschreibung" type="text" name="beschreibung_projekt" required="" value="<?php echo $beschreibung_projekt; ?>">
                                <br>  

                                <input class="m-3" id="nutzflaeche_projekt" placeholder="Nutzfläche"  type="text" name="nutzflaeche_projekt" required="" value="<?php echo $nutzflaeche_projekt; ?>">
      </div>
      <div class="col-xl-6 input-custom flex-column p-4 d-flex justify-content-center align-items-center">
                              

                                  <label for=""><strong>Planungsbeginn</strong></label>
                                  <input class="m-3" id="planungsbeginn_projekt" placeholder="Telefon" type="date" name="planungsbeginn_projekt" required="" value="<?php echo $planungsbeginn_projekt; ?>">

                                  <label for=""><strong>Fertigstellung</strong></label>
                                  <input class="m-3" id="fertigstellung_projekt" placeholder="e-mail" type="date"  name="fertigstellung_projekt" required="" value="<?php echo $fertigstellung_projekt; ?>">
                                  
                                  <input class="m-3" id="bauzeit_projekt" placeholder="Bauzeit" type="text"  name="bauzeit_projekt" required="" value="<?php echo $bauzeit_projekt; ?>">
                            
                                  <input id="foto_projekt" type="file" name="foto_projekt" required="" accept="image/*">



      </div>
                      <div class="col-xl-12 flex-column p-5 d-flex justify-content-center align-items-center">
                      <button class="btn-custom" type="submit" name="submit" id="submit">Projekt Daten ändern</button>


                  </form>
      </div>
    </div>
</div>



  <?php include 'footer-Backend.php' ?>

  <script src="js/bootstrap.min.js"></script>
</body>
</html>