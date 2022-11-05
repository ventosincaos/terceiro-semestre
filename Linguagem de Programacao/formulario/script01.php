<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



<!--
        $nome = $_GET["nome"];
        $genero = $_GET["genero"];
        $nascimento = $_GET["nascimento"];
        $telefone = $_GET["telefone"];
        $email = $_GET["email"];

        echo "<p>Olá! $nome seu gênero é $genero </p>";
        echo "<p> você nasceu em $nascimento</p>";
        echo "<p> suas informações de contato são: <br> </p>";
        echo "<p> telefone: $telefone <br> email: $email </p>";
-->
    <?php
        $pessoas["nome"] = $_GET["nome"];
        $pessoas["genero"] = $_GET["genero"];
        $pessoas["nascimento"] = $_GET["nascimento"];
        $pessoas["telefone"] = $_GET["telefone"];
        $pessoas["email"] = $_GET["email"];

        $linha = json_encode ($pessoas);
        $arq = fopen ("script00","a".PHP_EOL);
        $y = fwrite($arq,$linha);
        $y = fclose($arq);
    ?>

</body>
</html>