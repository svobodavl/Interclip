<?php
if (isset($_POST['url'])) {
  if (filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
    include "db.php";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $DBName);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    function gen_uid($len = 10)
    {
      return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $len);
    }
    $usr = gen_uid(5);
    $url = $_POST['url'];
    $timestamp = date("Y-m-d H:i:s");

    $sqlquery = "SELECT * FROM userurl WHERE url = '$url'";
    $result = $conn->query($sqlquery);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $usr = $row['usr'];
        break;
      }
      $conn->query($sqlquery);
    } else {
      $sqlquery = "INSERT INTO userurl (id, usr, url, date) VALUES (NULL, '$usr', '$url', '$timestamp') ";
      if ($conn->query($sqlquery) === TRUE) { } else {
        echo "Error: " . $sqlquery . "<br>" . $conn->error;
      }
    }

    $conn->close();
  }
  echo $usr;
} else {
<<<<<<< Updated upstream
  echo "Error: no URL given";
  // my else codes goes
=======
  echo "Error: no URL given";
  die();
>>>>>>> Stashed changes
}
