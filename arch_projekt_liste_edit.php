<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include 'head.php'
  ?>
  <title>Projekte Bearbeiten</title>
</head>
<body>

<?php include 'nav-Backend.php' ?>


<button onclick="topFunction()" id="scroll-top" class="shadow-4-strong" title="Nach oben scrollen"><i class="fas fa-arrow-up"></i></button>

<div class="container pt-5">
  <div class="row">
    <div class="col-md-12"><h1>Projekte Bearbeiten</h1></div>
  </div>
</div>


  <?php

  include 'db_connect.php';
    if ($conn) {
        $sql = "SELECT * FROM arch_projekte_table;";

        $result = mysqli_query($conn, $sql);

        if ($result) {
          while ( $row = mysqli_fetch_assoc($result)) {
            extract($row);
            ?>

                <div class="container pt-5 pb-5">
                  <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <div>
                              <h2><?php echo $name_projekt ?></h2>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p><strong> subtitel <?php echo $subtitel_projekt ?> </strong></p>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p>Beschreibung <?php echo $beschreibung_projekt ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>
                            <div>
                              <p> Nutzfläche :  <?php echo $nutzflaeche_projekt ?></p>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p>Planungsbeginn : <strong><?php echo $planungsbeginn_projekt ?></strong></p>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p>Fertigstellung : <strong><?php echo $fertigstellung_projekt ?></strong></p>
                            </div>
                        </div>
                        <div>
                            <div>
                              <p>Bauzeit : <?php echo $bauzeit_projekt ?></p>
                            </div>
                        </div>

                        
                            <div class="col-xl-6 d-flex flex-row pt-5 pb-5">
                                <div>
                                  <a class="btn-custom text-decoration-none" href="<?php echo 'delete_arch_projekt.php?id=' .  $id_arch_projekt ?>" onclick="return confirmDelete();">Löschen</a>
                                </div>

                                <div>
                                    <a class="btn-custom m-5 text-decoration-none" href="<?php echo 'edit_arch_projekt.php?id=' .  $id_arch_projekt ?>">Bearbeiten</a>
                                </div>
                            </div>





                    </div>
                    <div class="col-lg-4  mt-4">
                        <div>
                            <div>
                              <img class="img-fluid" src=<?php echo 'img/' . $foto_projekt; ?> >
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            <?php
          }
        }
    }
  ?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5 mb-5">
    </div>
  </div>
</div>


  <?php include 'footer-Backend.php' ?>
  <script src="js/bootstrap.min.js"></script>

  <script>
function confirmDelete() {
    return confirm('Sind Sie sicher, dass Sie dieses Projekt löschen möchten?');
}
</script>
<script>
    window.onscroll = function () {
    scrollFunction()
};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scroll-top").style.display = "block";
    } else {
        document.getElementById("scroll-top").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
  </script>

</body>
</html>