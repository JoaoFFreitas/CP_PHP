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
            <form action="update.php" class="contactForm" method="post">
                Nome<input type="text" id="nome" name="nome" placeholder="O seu nome"> <br>
                Telemóvel<input type="text" id="telemovel" name="telemovel" placeholder="O seu contacto"> <br>
                E-mail<input type="email" name="email" id="email" placeholder="O seu e-mail"> <br>
                Utilizador<input type="text" id="user" name="user" placeholder="Nome de utilizador"> <br>
                Password <input type="password" id="password" name="password" placeholder="Password"> <br>
                <input id="button" type="submit" value="Alterar Dados Pessoais" style="margin-top: 20px;"> <br>
            </form>
        </div>
    <?php
    }
    ?>

    <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>