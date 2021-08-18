
<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Dashboard</title>
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-fixed-top navbar-dark bg-danger main-nav">
    <div class="container">
        <div class="navbar-collapse collapse nav-content order-2">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="burgers.php">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kandidaten.php">Kandidaten</a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav text-nowrap flex-row mx-md-auto order-1 order-md-2">
            <li class="text-light"><h5>Automatisering van Verkiezing</h5></li>
            <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target=".nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </ul>
        <div class="ml-auto navbar-collapse collapse nav-content order-3 order-md-3">
            <ul class="ml-auto nav navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-light ml-md-3" href="#" data-toggle="modal" data-target="#logoutModal">Logout →</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
        <!-- DataTales Example -->
        <center>
        <div class="card w-50">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kandidaten gegevens wijzigen</h6>
          </div>
          <div class="card text-left">
          <div class="card-body">

            <?php
            if (isset($_POST['edit_btn'])) {
              $id = $_POST['edit_id'];
              $query = "SELECT * FROM kandidaten WHERE ID='$id'";
              $query_run = mysqli_query($conn, $query);

              foreach ($query_run as $row) {
            ?>

                <form action="kandidaten_save.php" method="POST">
                  <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                  <div class="form-group">
                    <label> Achternaam </label>
                    <input type="text" name="edit_anaam" value="<?php echo $row['Achternaam'] ?>" class="form-control" placeholder="Naam">
                  </div>
                  <div class="form-group">
                    <label> Voornaam </label>
                    <input type="text" name="edit_vnaam" value="<?php echo $row['Voornaam'] ?>" class="form-control" placeholder="Voornaam">
                  </div>
                  <div class="form-group">
                        <select name="edit_partij" value="<?php echo $row['PartijID'] ?>" class="browser-default custom-select  col-sm-12">
        									<option value="">partij</option>
        									<option value="1">Algemene Bevrijdings- en Ontwikkelingspartij</option>
        									<option value="2">Nationale Democratische Partij</option>
        									<option value="3">Nationale Partij Suriname</option>
        									<option value="4">Pertjajah Luhur</option>
        									<option value="5">STREI!</option>
        									<option value="6">Vooruitstrevende Hervormings Partij</option>
        								</select>
                      </div>
                      <div class="form-group">
                        <select name="edit_district" value="<?php echo $row['DistrictID'] ?>" class="browser-default custom-select  col-sm-12">
                          <option value="">district</option>
                          <option value="1">Brokopondo</option>
                          <option value="2">Commewijne</option>
                          <option value="3">Coronie</option>
                          <option value="4">Marowijne</option>
                          <option value="5">Nickerie</option>
                          <option value="6">Para</option>
                          <option value="7">Paramaribo</option>
                          <option value="8">Saramacca</option>
                          <option value="9">Sipaliwini</option>
                          <option value="10">Wanica</option>
                        </select>
                      </div>


                  <a href="kandidaten.php" class="btn btn-danger">CANCEL</a>
                  <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
                </form>
              </div>




            <?php
              }
            }
            ?>



          </div>
        </div>
      </div>
    </center>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Klaar om weg te gaan?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Druk op de "uitloggen knop" als u klaar bent om uit te loggen.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="logout.php" method="POST">
              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>




</body>

</html>
