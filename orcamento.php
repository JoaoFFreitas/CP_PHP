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
  <title>Exercicio JavaScript - Orçamento</title>
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
  <div class="contentWrapper">
    <h2>Dados</h2>

    <div id="formOrcamento">
      <form action="dadosOrcamento.php" onchange="validate()" onsubmit="valor()" method="POST">
        Nome: <input type="text" id="name" name="nome" required><span><i id="notok" class="fa-solid fa-xmark"></i><i id="ok" class="fa-solid fa-check"></i></span>
        <br>
        Apelido: <input type="text" id="lName" name="lName" required><span><i id="notok1" class="fa-solid fa-xmark"></i><i id="ok1" class="fa-solid fa-check"></i></span> <br>
        Telemóvel: <input type="text" id="number" name="number" required><span><i id="notok2" class="fa-solid fa-xmark"></i><i id="ok2" class="fa-solid fa-check"></i></span> <br>

        <h3>Pedido de orçamento</h3>
        Tipo de página web: <select name="formato" id="formato">
          <option value="0">Wordpress</option>
          <option value="1">WIX</option>
          <option value="2">SquareSpace</option>
          <option value="3">De Raíz (Frontend e Backend)</option>
        </select> <br>
        Prazo em meses: <input type="text" id="prazo" name="prazo"> <br>
        <h4>Marque os separadores desejados</h4>
        <input type="checkbox" name="who" id="">Quem somos
        <input type="checkbox" name="where" id="">Onde estamos <br>
        <input type="checkbox" name="galery" id="">Galeria de fotografias
        <input type="checkbox" name="eCommerce" id="">eCommerce <br>
        <input type="checkbox" name="gest" id="">Gestão interna
        <input type="checkbox" name="news" id="">Notícias <br>
        <input type="checkbox" name="social" id="">Redes sociais <br>

        <h4>Orçamento estimado</h4>
        <p>(É um valor meramente indicativo, pode sofrer alterações)</p>
        <h4 id="total" name="total"></h4> <br>

        <input id="button" type="submit" value="Enviar Orçamento" style="margin-top: 20px;">
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
        $nomedeutilizador = $_SESSION["nome_utilizador"];
        if (!empty($nomedeutilizador)) {
          $query = "SELECT * FROM projetos WHERE utilizador = '$nomedeutilizador' ORDER BY id DESC LIMIT 5";;

          $resultado = $conn->query($query);

          if ($resultado->num_rows > 0) {
            echo '<br><br>';
            echo '<table class="tableOrc">';
            echo '<tr><th>Ultimos 5 orçamentos:</th></tr> <br>';
            echo '<tr><th>Utilizador</th><th>Nome</th><th>Apelido</th><th>Número</th><th>Formato</th><th>Prazo(meses)</th><th>Quem Somos</th><th>Onde estamos</th><th>Galeria</th><th>eCommerce</th><th>Gestão Interna</th><th>Notícias</th><th>Redes Sociais</th><th>Valor</th></tr>';

            while ($row = $resultado->fetch_assoc()) {
              echo '<tr>';
              echo '<td class="tabelaOrcamento">' . $row['utilizador'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['nome'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['apelido'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['numero'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['formato'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['prazo'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['quem'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['onde'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['galeria'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['eCommerce'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['gestao'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['noticias'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['social'] . '</td>';
              echo '<td class="tabelaOrcamento">' . $row['valor'] . '</td>';
              echo '</tr>';
            }
            echo '</table>';
          }
        }

        ?>

      </form>


    </div>
  </div>

  <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>

</body>

</html>