<?php include 'includes/session.php';
$_SESSION['admin'];

$Naam = '';
$Stemmen = '';

//query to get data from the table
$sql = "SELECT Achternaam, AantalStemmen FROM kandidaten ";
  $result = mysqli_query($conn, $sql);

//loop through the returned data
while ($row = mysqli_fetch_array($result)) {

  $Naam = $Naam . '"'. $row['Achternaam'].'",';
  $Stemmen = $Stemmen . '"'. $row['AantalStemmen'] .'",';
}

$Naam = trim($Naam,",");
$Stemmen = trim($Stemmen,",");

?>

<?php
$Partij = '';


//query to get data from the table
$sql = "SELECT * FROM partij ";
  $result = mysqli_query($conn, $sql);

//loop through the returned data
while ($row = mysqli_fetch_array($result)) {

  $Partij = $Partij . '"'. $row['PartijAfkorting'].'",';
}

$Partij = trim($Partij,",");
?>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>


    <script src="./myChart.js"></script>

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

<div class="container-fluid display-table">
  <div class="row display-table-row">
      <div class="col-md-10 col-sm-11 display-table-cell v-align">
          <div class="user-dashboard">
              <div>
                <h2>Dashboard</h2>
              </div>
              <div class="row">
                <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-blue order-card">
                      <div class="card-block">
                          <h6 class="m-b-20">Aantal Burgers</h6>
                          <h2 class="text-right numbers"><i class="fa fa-users f-left"></i>
                            <span>
                             <?php
                              $sql = "SELECT * FROM burgers";
                              $query = $conn->query($sql);

                              echo "<h3>".$query->num_rows."</h3>";
                              ?>
                            </span>
                        </h2>
                      </div>
                  </div>
              </div>



              <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-green order-card">
                      <div class="card-block">
                          <h6 class="m-b-20">Burgers Gestemd</h6>
                          <h2 class="text-right numbers"><i class="fa fa-check-square f-left"></i>
                            <span><?php
                             $sql = "SELECT * FROM `burgers` WHERE `Gestemd` = 'Ja'  ";
                             $query = $conn->query($sql);

                             echo "<h3>".$query->num_rows."</h3>";
                             ?></span></h2>
                      </div>
                  </div>
              </div>

              <div class="col-md-4 col-xl-3">
                  <div class="card bg-c-yellow order-card">
                      <div class="card-block">
                          <h6 class="m-b-20">Aantal Kandidaten</h6>
                          <h2 class="text-right numbers"><i class="fa fa-users f-left"></i>
                            <span>
                              <?php
                               $sql = "SELECT * FROM kandidaten";
                               $query = $conn->query($sql);

                               echo "<h3>".$query->num_rows."</h3>";
                               ?>
                         </span>
                       </h2>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</div>

<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Aantal Stemmen Per Kandidaat</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Aantal Stemmen Per Partij</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <br>
                              <h1>Kandidaten</h1>
                        			<canvas id="chart"  width="1000" height="250"></canvas>

                        			<script>
                        				var ctx = document.getElementById("chart").getContext('2d');
                            			var myChart = new Chart(ctx, {
                                		type: 'bar',
                        		        data: {
                        		            labels: [<?php echo $Naam; ?>],
                        		            datasets:
                        		            [{
                        		                label: 'Aantal Stemmen',
                        		                data: [<?php echo $Stemmen; ?>],
                                            backgroundColor: "#3e95cd",
                        		                borderWidth: 3
                        		            },

                        		            ]
                        		        },

                        		        options: {
                        		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                        		            tooltips:{mode: 'index'},
                        		            legend:{display: true, position: 'top', labels: { fontSize: 16}}
                        		        }
                        		    });
                        			</script>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <br>
                              <h1>Partijen</h1>
                        			<canvas id="Lchart" width="1000" height="250"></canvas>

                        			<script>
                        				var ctx = document.getElementById("Lchart").getContext('2d');
                                var myChart = new Chart(ctx, {
                              		type: 'bar',
                      		        data: {
                      		            labels: [<?php echo $Partij; ?>],
                      		            datasets:
                      		            [{
                      		                label: 'Aantal Stemmen',
                      		                data: [<?php echo $Stemmen; ?>],
                      		              	backgroundColor: "#3e95cd",
                      		                borderWidth: 3
                      		            },

                      		            ]
                      		        },

                      		        options: {
                      		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                      		            tooltips:{mode: 'index'},
                      		            legend:{display: true, position: 'top', labels: { fontSize: 16}}
                      		        }
                      		    });
                        			</script>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>



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
