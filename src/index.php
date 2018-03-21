<HTML>
  <link rel="shortcut icon" href="about:blank">
<BODY>
<?php
$servername = getenv('MYSQL_ADDR');
$username = getenv('MYSQL_ENV_MYSQL_USER');
$password = getenv('MYSQL_PASS');
$dbname = "magento";
$table = "visitors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
$sql = "CREATE TABLE $table ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ip varchar(30) NOT NULL)";
$check_table = "SHOW TABLES LIKE $table";
if($conn->query($check_table) == 0) {
  $conn->query($sql);
}
$sql = "INSERT INTO $table (ip) VALUES ('$_SERVER[REMOTE_ADDR]')";
if ($conn->query($sql) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$visitor = $result->fetch_assoc();
echo "<br><p align='center'>You are visitor number $visitor[id] with the IP address: $visitor[ip] </p>";
$conn->close();
?>

</BODY>
</HTML>
