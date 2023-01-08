<?php
$servername = "###";
$username = "spoilme";
$password = "###";
$dbname = "spoilme_1";
$output = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM spoilers where name LIKE '%".$_POST['search']."%'";
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($result)) {
    $output .= "<tdl><li><a href='https://".$row['href']."'>".$row['name']."</li></td>";
    
}
echo "$output";


mysqli_close($conn);
?>