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
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$num = $_POST["telemovel"];
$utilizador = $_POST["user"];
$userPassword = $_POST["password"];
$passEncrypt = password_hash("$userPassword", PASSWORD_BCRYPT);
$id = $_SESSION["utilizador"];


$sql = "UPDATE Utilizadores SET utilizadores = IFNULL(NULLIF('$utilizador', ''), utilizadores), nome = IFNULL(NULLIF('$nome', ''), nome), email = IFNULL(NULLIF('$email', ''), email), telefone = IFNULL(NULLIF('$num', ''), telefone), palavraChave = IFNULL(NULLIF('$passEncrypt', ''), palavraChave) WHERE id = '$id'";

if ($conn->query($sql) === true) {
    header("Location: area_pessoal.php");
} else {
    echo "erro" . $conn->error;
};
$conn->close();
