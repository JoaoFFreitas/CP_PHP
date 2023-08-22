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

$nome = $_POST["nome"];
$email = $_POST["email"];
$num = $_POST["telemovel"];
$utilizador = $_POST["user"];
$userPassword = $_POST["password"];
$passEncrypt = password_hash("$userPassword", PASSWORD_BCRYPT);


$sql = "INSERT INTO Utilizadores (utilizadores, nome, email, telefone, palavraChave) VALUES ('$utilizador','$nome','$email','$num','$passEncrypt')";

if ($conn->query($sql) === true) {
    header("Location: index.php");;
} else {
    echo "erro" . $conn->error;
};
$conn->close();
