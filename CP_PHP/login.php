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
$utilizador = $_POST["lUser"];
$userPassword = $_POST["lPassword"];
$passEncrypt = password_hash("$userPassword", PASSWORD_BCRYPT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM Utilizadores WHERE utilizadores = '$utilizador'";
    $resultado = $conn->query($sql);
}
if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();
}
if (password_verify($userPassword, $row["palavraChave"])) {
    session_start();
    $_SESSION["utilizador"] = $row["id"];
    $_SESSION["nome_utilizador"] = $row["utilizadores"];
    $_SESSION["nivel_utilizador"] = $row["nivel"];
    header("Location: principal.php");

    exit();
} else {
}
$conn->close();
