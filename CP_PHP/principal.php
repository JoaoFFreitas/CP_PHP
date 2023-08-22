<?php
session_start();
$nomedeutilizador = $_SESSION["nome_utilizador"];
if (empty($nomedeutilizador)) {
  $nomedeutilizador = "Área Pessoal";
};
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercicio JavaScript - Index</title>
  <link rel="stylesheet" href="Style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

</head>


<body onload="iniciar()">
  <nav>
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="header">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="principal.php">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.php">Portfólio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orcamento.php">Pedido de Orçamento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactos.php">Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="area_pessoal.php"><?php echo $nomedeutilizador; ?></a>
          </li>
          <?php
          if ($_SESSION["nivel_utilizador"] === "admin") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Administrador</a>
            </li>
          <?php
          } else {
          }
          ?>
          <?php
          if (!empty($_SESSION["utilizador"])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <h2 class="contentWrapper">Feed de Notícias</h2>


  <div class="caixa contentWrapper" id="caixa">
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

    if ($_SESSION["nivel_utilizador"] === "admin") {
      $query = "SELECT id, title, content FROM Noticias";
    } else {
      $query = "SELECT id, title, content FROM Noticias ORDER BY id DESC LIMIT 5";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows > 0) {
      while ($row = $resultado->fetch_assoc()) {
        echo  "<h3 class='noticiaTitulo'>" . $row['title'] . "</h3> <p class='noticiaContent'>" . $row['content'] . "</p> <br><br>";
      }
    }

    $conn->close();
    ?>

  </div>
  <footer>
    <p>Made by João Freitas</p>
  </footer>
  <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>

</body>

</html>