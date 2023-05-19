<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "students_data";


$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM students";
$result = $data->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "<p>Student: " . $row["full_name"] . "<br>Email: " . $row["email"] . "<br>Gender: " . $row["gender"] . "</p>";
}
}
?>