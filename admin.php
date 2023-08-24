<?php
session_start();
$nomedeutilizador = $_SESSION["nome_utilizador"];
if (empty($nomedeutilizador)) {
    $nomedeutilizador = "Área Pessoal";
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Pessoal</title>
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
    <?php
    if (empty($_SESSION["utilizador"])) {
    ?>
        <div style="padding-top: 150px;">
            <form action="login.php" class="contactForm" method="POST">

                Utilizador<span class="marca">*</span> <input type="text" id="lUser" name="lUser" placeholder="Nome de utilizador" required> <br>
                Password<span class="marca">*</span> <input type="password" id="lPassword" name="lPassword" placeholder="password" required> <br>
                <p>Se ainda não está registado registe-se <a href="register.php" Style="color: blue; text-decoration: underline;">aqui.</a></p>
                <input id="button" type="submit" value="Login"> <br>
                <p id="obrigatorio">(Todos os campos marcados com <span class="marca">*</span> são de preenchimento obrigatório)
                </p>

            </form>
        </div>
    <?php
    } else { ?>
        <div style="padding-top: 120px;">

            <form action="updateLevel.php" class="contactForm admin" method="POST">
                <h3 style="margin:auto;">Alterar nivel de acessos</h3>
                <label for="">Selecionar utilizador</label>

                <select name="userLevel" id="userLevel">
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
                    $id = $_SESSION["utilizador"];

                    $query = "SELECT id, utilizadores FROM Utilizadores";
                    $resultado = $conn->query($query);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['utilizadores'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <label for="">Selecionar Nível</label>
                <select name="nivel" id="nivel">
                    <option value="admin">admin</option>
                    <option value="">utilizador</option>
                </select>
                <input id="button" type="submit" name="submit" value="Alterar Nível de acessos" style="margin-top: 20px;"> <br>
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
                    $query = "SELECT * FROM utilizadores WHERE nivel = 'admin' ";

                    $resultado = $conn->query($query);

                    if ($resultado->num_rows > 0) {
                        echo '<table class="tableOrc">';
                        echo '<tr><th>Administradores</th></tr>';

                        while ($row = $resultado->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td class="tabelaOrcamento">' . $row['utilizadores'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    }
                } ?>

            </form>
            <div>

            </div>
        </div>
        <div>
            <form action="insertNews.php" class="contactForm admin" method="post">
                <h3 style="margin:auto;">Submeter Notícias</h3>
                <label for="">Título:</label>
                <input type="text" name="newsTitle" id="newsTitle" placeholder="Insira o titulo">
                <label for="">Conteúdo:</label>
                <textarea name="newsContent" id="newsContent" cols="30" rows="10" maxlength="500" placeholder="Inserir conteúdo da notícia"></textarea>
                <input id="button" type="submit" name="submit" value="Submeter" style="margin-top: 20px;"> <br>
            </form>
        </div>
    <?php
    }
    ?>

    <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>