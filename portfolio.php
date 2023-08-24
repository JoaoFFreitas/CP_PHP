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
  <title>Exercicio JavaScript - Portfólio</title>
  <link rel="stylesheet" href="Style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</head>

<body>
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


  </form>
  </div>
  <div class="contentWrapper">
    <h2 id="portTitle">O nosso Portfólio</h2>
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

    if (empty($_SESSION["nome_utilizador"])) {
    ?>
      <table class="images">
        <tr>
          <td>O Campo</td>
          <td>O Oceano</td>
          <td>O Outono na estrada</td>
        </tr>
        <tr>
          <td>
            <a class="example-image-link" href="images/image1.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image1.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image2.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image2.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image3.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image3.jpeg" alt="image-1" width="300px" /></a>
          </td>
        </tr>
        <tr>
          <td>A Praia</td>
          <td>Pôr do Sol na Floresta</td>
          <td>A Ilha</td>
        </tr>
        <tr>
          <td>
            <a class="example-image-link" href="images/image4.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image4.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image5.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image5.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image6.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image6.jpeg" alt="image-1" width="300px" /></a>
          </td>
        </tr>
        <tr>
          <td>A Joaninha</td>
          <td>Neve nas Árvores</td>
          <td>Pôr do Sol na Praia</td>
        </tr>
        <tr>
          <td>
            <a class="example-image-link" href="images/image7.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image7.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image8.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image8.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image9.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image9.jpeg" alt="image-1" width="300px" /></a>
          </td>
        </tr>
        <tr>
          <td>O Lago</td>
          <td>O Rio</td>
          <td>Os Rápidos</td>
        </tr>
        <tr>
          <td>
            <a class="example-image-link" href="images/image10.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image10.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image11.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image11.jpeg" alt="image-1" width="300px" /></a>
          </td>
          <td>
            <a class="example-image-link" href="images/image12.jpeg" data-lightbox="example-1">
              <img class="example-image" src="images/image12.jpeg" alt="image-1" width="300px" /></a>
          </td>
        </tr>
      </table>

    <?php
    } else {
      $utilizador = $_SESSION["nome_utilizador"];
      $sql = "SELECT pasta , title FROM Portfolio WHERE utilizadores = '$utilizador'";
      $resultado = $conn->query($sql);
    ?>
      <div class="contentWrapper">
        <form action="portfolioData.php" method="post" enctype="multipart/form-data">
          <h3>Inserir imagem</h3>
          <label for="">Título da imagem:</label>
          <input type="text" name="title" id="title" placeholder="Insira um título..."> <br>
          <input type="file" name="ficheiro" size="35"> <br>
          <button type="submit" name="enviar">Submeter Ficheiro</button>
          <input type="hidden" name="acc" value="submeter">
      </div>
    <?php

      if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
          echo "<div class='uploadedImg'>";
          echo "<h3>" . $row['title'] . "</h3>";
          echo "<a class='example-image-link' href=" . $row['pasta'] . " data-lightbox='example-1'>";
          echo "<img class='example-image' src=" . $row['pasta'] . " alt='image-1' width='700px' /></a>";
          echo "</div>";
        }
      }
      $conn->close();
    }

    ?>
  </div>

  <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
  <link href="lightbox/lightbox.css" rel="stylesheet" />
  <script src="lightbox/lightbox-plus-jquery.js"></script>
  <script src="script.js"></script>
</body>

</html>