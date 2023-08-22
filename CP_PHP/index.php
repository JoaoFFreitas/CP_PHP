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
    <form action="login.php" class="contactForm" method="POST" style="margin-top: 150px;">

        Utilizador<span class="marca">*</span> <input type="text" id="lUser" name="lUser" placeholder="Nome de utilizador" required> <br>
        Password<span class="marca">*</span> <input type="password" id="lPassword" name="lPassword" placeholder="password" required> <br>
        <p>Se ainda não está registado registe-se <a href="register.php" Style="color: blue; text-decoration: underline;">aqui.</a></p>
        <input id="button" type="submit" value="Login"> <br>
        <p id="obrigatorio">(Todos os campos marcados com <span class="marca">*</span> são de preenchimento obrigatório)
        </p>

    </form>


    <script src="https://kit.fontawesome.com/ec4cd7dbd5.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>