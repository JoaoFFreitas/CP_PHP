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
$formatoFinal = "";
$prazo = $_POST['prazo'];
$who = isset($_POST['who']) ? 'Sim' : 'Não';
$where = isset($_POST['where']) ? 'Sim' : 'Não';
$galeria = isset($_POST['galery']) ? 'Sim' : 'Não';
$eCommerce = isset($_POST['eCommerce']) ? 'Sim' : 'Não';
$gest = isset($_POST['gest']) ? 'Sim' : 'Não';
$news = isset($_POST['news']) ? 'Sim' : 'Não';
$social = isset($_POST['social']) ? 'Sim' : 'Não';
$valor = $_POST['valoresFinal'];

if ($formato == 0) {
    $formatoFinal = "Wordpress";
} elseif ($formato == 1) {
    $formatoFinal = "WIX";
} elseif ($formato == 2) {
    $formatoFinal = "SquareSpace";
} elseif ($formato == 3) {
    $formatoFinal = "De Raíz (Frontend e Backend)";
};


$sql = "INSERT INTO Projetos (utilizador, nome, apelido, numero, formato, prazo, quem, onde, galeria, eCommerce, gestao, noticias, social, valor) 
VALUES('$utilizador','$nome','$apelido','$numero','$formatoFinal','$prazo','$who','$where','$galeria','$eCommerce','$gest','$news','$social','$valor')";

if ($conn->query($sql) === true) {
    header("Location: orcamento.php");
} else {
    echo "erro" . $conn->error;
};
$conn->close();
