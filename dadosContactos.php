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
$utilizador = $_SESSION['nome_utilizador'];
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$numero = $_POST['numero'];
$mail = $_POST['mail'];
$motivo = $_POST['motivo'];


$sql = "INSERT INTO clientes (utilizador, nome, apelido, numero, mail, motivo) 
VALUES('$utilizador','$nome','$apelido','$numero','$mail','$motivo')";


if ($conn->query($sql) === true) {
    header("Location: contactos.php");
  
} else {
    echo "erro" . $conn->error;
};
$conn->close();
