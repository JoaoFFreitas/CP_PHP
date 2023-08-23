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


<body>
    <form action="dados.php" class="contactForm" method="POST" style="margin-top: 150px;">
        Nome<span class="marca">*</span> <input type="text" id="nome" name="nome" placeholder="O seu nome" required> <br>
        Telemóvel<span class="marca">*</span> <input type="text" id="telemovel" name="telemovel" placeholder="O seu contacto" required> <br>
        E-mail<span class="marca">*</span> <input type="email" name="email" id="email" placeholder="O seu e-mail" required> <br>
        Utilizador<span class="marca">*</span> <input type="text" id="user" name="user" placeholder="Nome de utilizador" required> <br>
        Password<span class="marca">*</span> <input type="password" id="password" name="password" placeholder="Password" required> <br>
        <input id="button" type="submit" value="Registar" style="margin-top: 20px;"> <br>
        <p id="obrigatorio">(Todos os campos marcados com <span class="marca">*</span> são de preenchimento obrigatório)
        </p>

    </form>


    <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>