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
$apelido = $_POST['lName'];
$numero = $_POST['number'];
$formato = $_POST['formato'];
$prazo = $_POST['prazo'];
$who = $_Post['who'];
$where = $_Post['where'];
$galeria = $_Post['galery'];
$eCommerce = $_Post['eCommerce'];
$gest = $_Post['gest'];
$news = $_Post['news'];
$social = $_Post['social'];
$valor = $_Post['total'];


$sql = "INSERT INTO Projetos (utilizador, nome, apelido, numero, formato, prazo, quem, onde, galeria, eCommerce, gestao, noticias, social, valor) VALUES('$utilizador','$nome','$apelido','$numero','$formato','$prazo','$who','$where','$galeria','$eCommerce','$gest','$news','$social','$valor')";

if ($conn->query($sql) === true) {
    header("Location: admin.php");;
} else {
    echo "erro" . $conn->error;
};
$conn->close();
