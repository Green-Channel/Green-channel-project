<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_channel";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if ($conn->error) {
	die("Connection failed: " . $conn->connect_error . "/br/n Try again later.");
}

$conn->query("set names 'utf8'");
$sql="select A07 from fresh_produce_info where A01='001001'";
$retval = mysqli_query( $conn, $sql );
$add=mysqli_fetch_array($retval);
if(! $add )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

?>