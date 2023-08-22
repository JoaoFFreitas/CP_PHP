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
  <title>Exercicio JavaScript - Contactos</title>
  <link rel="stylesheet" href="Style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-TBQhkFhUIeQHZuc5cOX0jeBy6mIB7uY&callback=myMap"></script>
</head>

<body onload="carregarMapa()">
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
              <a class="nav-link" href="administrador.php">Administrador</a>
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
  <div class="contentWrapper">
    <h2>Contactos</h2>
    <br>
    <div class="contact">
      <p><span><i class="fa-solid fa-house"></i></span> R. De Dona Estefânia 84 - A,1000-158 Lisboa</p>
      <p><span><i class="fa-solid fa-phone"></i></span> 213 180 430</p>
      <p><span><i class="fa-solid fa-envelope"></i></span> <a href="mailto:lisboa@masterd.pt">lisboa@masterd.pt</a></p>
    </div>

    <div id="myMap"></div>
    <div id="geo"><input id="direccao" type="textbox" value="Lisboa">
      <input type="button" value="Geolocalizar" onclick="geo()">
    </div>

    <form action="" class="contactForm">

      Nome<span class="marca">*</span> <input type="text" placeholder="O seu nome" required> <br>
      Apelido<span class="marca">*</span> <input type="text" placeholder="O seu apelido" required> <br>
      Telemóvel<span class="marca">*</span> <input type="text" placeholder="O seu contacto" required> <br>
      E-mail<span class="marca">*</span> <input type="email" name="" id="" placeholder="O seu e-mail" required> <br>
      Data<span class="marca">*</span><input type="date" name="" id="" required> <br>
      Motivo do Contacto da Reunião<span class="marca">*</span><br>
      <textarea name="" id="" cols="30" rows="3" required placeholder="Insira o seu texto aqui..."></textarea> <br>
      <input id="button" type="submit" value="Enviar"> <br>
      <p id="obrigatorio">(Todos os campos marcados com <span class="marca">*</span> são de preenchimento obrigatório)
      </p>

    </form>
  </div>

  <footer>
    <p>Made by João Freitas</p>
  </footer>
  <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>

</body>

</html>