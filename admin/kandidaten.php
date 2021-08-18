<?php include 'includes/session.php'; ?>
<?php include 'includes/voters_modal.php'; ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Dashboard</title>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
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
    <div class="container-fluid">

			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Alle kandidaten
            <a href="#addkan" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nieuw</a>
					</h6>
				</div>

				<div class="card-body">
					<?php
          if(isset($_SESSION['error'])){
            echo "
              <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                ".$_SESSION['error']."
              </div>
            ";
            unset($_SESSION['error']);
          }
          if(isset($_SESSION['success'])){
            echo "
              <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Success!</h4>
                ".$_SESSION['success']."
              </div>
            ";
            unset($_SESSION['success']);
          }
					?>
					<div>
						<input type="text" name="search" id="search" class="form-control" placeholder="Zoeken..." />
					</div>
					<br><br>

					<div class="table-responsive">
						<?php
            $query = "SELECT kandidaten.ID, Achternaam, Voornaam, partij.PartijNaam as Partij, district.DistrictNaam as District, kandidaten.AantalStemmen FROM kandidaten, partij, district WHERE kandidaten.DistrictID = district.ID AND kandidaten.PartijID = partij.ID";
            $query_run = mysqli_query($conn, $query);
						?>

						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
                  <th>#</th>
									<th>Achternaam</th>
									<th>Voornaam</th>
                  <th>Partij</th>
                  <th>District</th>
                  <th>AantalStemmen</th>
									<th>Wijzigen </th>
									<th>Verwijderen </th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php
								if (mysqli_num_rows($query_run) > 0) {
									while ($row = mysqli_fetch_assoc($query_run)) {

								?>

										<tr>
                      <td> <?php echo $row['ID']; ?> </td>
											<td> <?php echo $row['Achternaam']; ?> </td>
											<td> <?php echo $row['Voornaam']; ?> </td>
                      <td> <?php echo $row['Partij']; ?> </td>
                      <td> <?php echo $row['District']; ?> </td>
                      <td> <?php echo $row['AantalStemmen']; ?> </td>
											<td>
												<form action="kandidaten_edit.php" method="post">
													<input type="hidden" name="edit_id" value="<?php echo $row['ID']; ?>">
                          <button type="submit" name="edit_btn" class="btn btn-success"><i class="fa fa-edit"></i> Wijzigen</button>
                        </form>
											</td>
											<td>
                        <form action="kandidaten_delete.php" method="post">
                          <input type="hidden" name="delete_id" value="<?php echo $row['ID']; ?>">
                          <button type="submit" name="delete_btn" class='btn btn-danger'><i class='fa fa-trash'></i> Verwijderen</button>
                        </form>
                    	</td>
										</tr>
								<?php
									}
								} else {
									echo "No records found";
								}

								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>


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
