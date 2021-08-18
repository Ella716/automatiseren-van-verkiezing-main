<?php
include 'admin\includes\conn.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemformulier</title>
    <link rel="stylesheet" href="css\stemform.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js\function.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

</head>


<body>
    <center style="padding-top:15px;">
        <i class="flag-icon flag-icon-sr"></i>
        <button id="admin_login" type="button" class="btn btn-secondary">
            <i class="fa fa-lock" aria-hidden="true"> ADMIN</i></button>
    </center>
    <script type="text/javascript">
        document.getElementById("admin_login").onclick = function() {
            location.href = "admin/index.php";
        };
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card">
                    <div class="card-header">Stemformulier</div>
                    <form id="msform" action="" method="post">
                        <ul id="progressbar">
                            <li class="active" id="personal"><strong>Persoonlijk</strong></li>
                            <li id="kandidaten"><strong>Partij</strong></li>
                            <li id="kandidaten"><strong>Kandidaten</strong></li>
                            <!--<li id="finish"><strong>Finish</strong></li>-->
                        </ul>
                        <br>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Persoonlijke Informatie:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Stap 1 - 4</h2>
                                    </div>
                                </div>
                                <input type="text" name="id_num" id="user_num" onblur="checkAvailability()" placeholder="Voer hier uw ID in....">
                                <span id="user-availability-statusa"></span>
                            </div>
                            <input type="button" name="next" id="next_btn" style='display:none;' class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Kies een Partij:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Stap 2 - 4</h2>
                                    </div>
                                </div>
                                <select class="browser-default custom-select  col-sm-12" onchange="fetchStem()" id="partij">
                                    <option>Selecteer Een Partij</option>
                                    <?php
                                    $query = "SELECT * FROM partij";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['ID'] . "'>" . $row['PartijNaam'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="id_partij">
                                <input type="hidden" id="id_district">
                                <span id="partij-availability-status"></span>
                            </div>
                            <input type="button" name="next" id="next_btn2" class="next action-button" onclick=getKandidaat() value="Next" />
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                        </fieldset>

                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Kies een Kandidaat:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Stap 3 - 4</h2>
                                    </div>
                                </div>
                                <select class="browser-default custom-select  col-sm-12" id="kandidaat">

                                </select>
                            </div>
                            <input type="button" name="next" id="sub_btn" class="next action-button" value="Submit" onclick="voltooid()" />
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Stap 4 - 4</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Voted</h5>
                                    </div>
                                    <a href="overzicht.php" class="next action-button" type="button">Overzicht</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function fetchStem() {
            var partij = $("#partij").val();
            jQuery.ajax({
                url: "fetch.php",
                type: "POST",
                data: {
                    partij: partij,
                    insertpartij: 1
                },
                success: function(data) {
                    $("#id_partij").val(data);
                },
                error: function() {}
            });
        }

        function getKandidaat() {
            var partij = $("#id_partij").val();
            var district = $("#id_district").val();
            jQuery.ajax({
                url: "fetch.php",
                type: "POST",
                data: {
                    partij: partij,
                    district: district,
                    getkandidaat: 1
                },
                success: function(data) {
                    $("#kandidaat").html(data);
                },
                error: function() {}
            });
        }

        function checkAvailability() {
            jQuery.ajax({
                url: "verify.php",
                data: 'id_num=' + $("#user_num").val(),
                type: "POST",
                success: function(data) {
                    if (data == 'error') {
                        $("#user-availability-statusa").html('ID is niet correct');
                        $("#next_btn").hide();
                    } else {
                        $("#id_district").val(data);
                        $("#user-availability-statusa").html('ID is  correct');
                        $("#next_btn").fadeIn();
                    }

                    if (data == 'gestemd') {
                        alert("U heeft al gestemd !")
                        window.location.href = "overzicht.php";
                    }

                },
                error: function() {}
            });
        }

        function voltooid() {
            var kandidaat = $("#kandidaat").val();
            var partij = $("#partij").val();
            var user_num = $("#user_num").val();
            jQuery.ajax({
                url: "fetch.php",
                type: "POST",
                data: {
                    kandidaat: kandidaat,
                    partij: partij,
                    user_num: user_num,
                    insertstem: 1
                },
                success: function(data) {},
                error: function() {}
            });
        }
        document.getElementById("next_btn").onclick = function() {
            if (document.getElementById("user_num").value.length == 0) {
                alert("ID nummer moet ingevoerd worden!")
                window.location.href = window.location.href;

            }
        };
    </script>
</body>

</html>
