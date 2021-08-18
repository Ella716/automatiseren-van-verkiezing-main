<?php include 'admin\includes\conn.php';
session_start();
if (isset($_POST['id_num']) && $_POST['id_num'] != "") {
  if ($stmt = $conn->prepare('SELECT IDnummer, DistrictID, Gestemd FROM burgers WHERE IDnummer = ?')) {
    $stmt->bind_param('s', $_POST['id_num']);
    $stmt->execute();
    //$stmt->store_result();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if (strpos($row['Gestemd'], 'Ja') !== false) {
          echo 'gestemd';
        }else{
          $a = $row['DistrictID'];
          echo $a;
        }
      }
    } else {
      echo 'error';
    }
  }
}else{
  echo 'error';
}
$conn->close();
