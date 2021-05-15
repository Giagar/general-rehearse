<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'practice_query'; // database's name
  $db_port = 8889;

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

// ---- check if the connection at the db is working properly
//   echo 'Success: A proper connection to MySQL was made.';
//   echo '<br>';
//   echo 'Host information: '.$mysqli->host_info;
//   echo '<br>';
//   echo 'Protocol version: '.$mysqli->protocol_version . '<hr>';

//   $mysqli->close();
// ----/ check if the connection at the db is working properly

// ---- query
$sql = "SELECT * FROM customers";
$result = $mysqli->query($sql);
// if there are matches
if ($result && $result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "Customer n. ". $row['id']. " name: ".$row['name'] . "<br>";
}
// ----/ query

// in case of no matches
} elseif ($result) {
echo "0 results";

// in case of errors
} else {
echo "query error";
}

// send the query
$mysqli->close();
