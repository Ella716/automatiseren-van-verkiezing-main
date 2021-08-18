<?php
include 'admin\includes\conn.php';
if (isset($_POST['insertpartij'])) {
    $partij = $_POST['partij'];
    $sql = "SELECT * FROM partij WHERE ID= $partij";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $a = $row['ID'];
            echo $a;
        }
    }
}

if (isset($_POST['getkandidaat'])) {
    $partij = $_POST['partij'];
    $district = $_POST['district'];
?>
    <?php
    $query = "SELECT * FROM kandidaten WHERE PartijID = $partij AND DistrictID = $district ";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<option>Selecteer Een Kandidaat</option>";
            echo "<option value='" . $row['ID'] . "'>" . $row['Achternaam'] . " " . $row['Voornaam'] . "</option>";
        }
    } else if ($count <= 0) {
        echo "<option>Geen Kandidaten</option>";
    }
}
    ?>
  <?php


    if (isset($_POST['insertstem'])) {
        $kandidaat = $_POST['kandidaat'];
        $partij = $_POST['partij'];
        $user_num = $_POST['user_num'];
        $sql = "UPDATE kandidaten, partij SET kandidaten.AantalStemmen=kandidaten.AantalStemmen+1, partij.AantalStemmen = partij.AantalStemmen+1  WHERE kandidaten.ID=$kandidaat AND partij.ID=$partij";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $_SESSION['district'] = " ";
            $_SESSION['slct_partij'] = " ";



            $sql1  = "UPDATE burgers SET Gestemd='Ja' WHERE IDnummer='$user_num'";
            $res1 = mysqli_query($conn, $sql1);
            if ($res1) {
                $_SESSION["gestemd"] = 'Ja';
                echo 'success';
            }
        } else {
            echo 'sqlError';
        }
    }
