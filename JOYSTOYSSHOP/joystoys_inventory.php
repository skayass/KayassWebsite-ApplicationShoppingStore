<?php
session_start();
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admins_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

$servername = "localhost";
$username = "Samia";
$password = "ABC123";
$dbname = "joys_toys";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ProductID, Quantity FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ProductID</th><th>Quantity</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['ProductID']}</td><td>{$row['Quantity']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>


<hr>

<br>
<br>
<br>
<!-- Add a button to link to the Manage page -->
    <a href="joystoys_manage.php"><button>Manage Page</button></a>