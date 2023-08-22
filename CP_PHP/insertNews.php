<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'CP_PHP';

$conn = @mysqli_connect($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
};

$titulo =  $_POST['newsTitle'];
$conteudo = $_POST['newsContent'];


$sql = "INSERT INTO Noticias (title, content) VALUES ('$titulo','$conteudo')";

if ($conn->query($sql) === true) {
    header("Location: admin.php");;
} else {
    echo "erro" . $conn->error;
};
$conn->close();
