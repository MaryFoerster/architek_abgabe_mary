<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include 'head.php'
  ?>
  <title>Projekte</title>
</head>
<body>

<?php include 'nav.php' ?>



<button onclick="topFunction()" id="scroll-top" class="shadow-4-strong" title="Nach oben scrollen"><i class="fas fa-arrow-up"></i></button>

<div class="container pt-5 pb-5">
  <div class="row">
    <div class="col-md-12"><h1>Projekte</h1></div>
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

                <div class="container border-2 p-5 pt-5 pb-2">
                  <div class="row">
                    <div class="col-lg-4 p-3">
                        <div>
                            <div>
                              <h2><?php echo $name_projekt ?></h2>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p class="text-muted"><strong> subtitel <?php echo $subtitel_projekt ?> </strong></p>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p>Beschreibung <?php echo $beschreibung_projekt ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 border-left p-5">
                        <div>
                            <div>
                              <p class="text-muted"> Nutzfläche : <strong> <?php echo $nutzflaeche_projekt ?> </strong></p>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p class="text-muted">Planungsbeginn : <strong><?php echo $planungsbeginn_projekt ?></strong></p>
                            </div>
                        </div>

                        <div>
                            <div>
                              <p class="text-muted">Fertigstellung : <strong><?php echo $fertigstellung_projekt ?></strong></p>
                            </div>
                        </div>
                        <div>
                            <div>
                              <p class="text-muted">Bauzeit : <strong> <?php echo $bauzeit_projekt ?> </strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
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


  <?php include 'footer.php' ?>

  <script src="js/bootstrap.min.js"></script>
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