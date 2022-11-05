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

        $linha = json_encode ($pessoas).chr(13).chr(10);
        $arq=fopen("formulario.txt","a");
        fwrite($arq,$linha);
        fclose($arq);    
        ?>

        <style>
                    #arquivo {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    }
                    
                    #arquivo td, #arquivo th {
                    border: 1px solid #ddd;
                    padding: 8px;
                    }
                    
                    #customers th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: #04AA6D;
                    color: white;
                    }
    </style>
    <table  id="arquivo">
    <?php

    $arquivo = fopen("formulario.txt", "r");

    echo "<tr><td>Nome</td><td>Sexo</td><td>Data de Nascimento</td><td>Telefone</td><td>E-mail</td></tr>";

    while(!feof($arquivo)) {
      $linha = json_decode(fgets($arquivo),true);
      if ($linha !=null) {echo"<tr>";
     foreach($linha as $info){
         echo "<td>".$info."</td>";
     }
      echo"</tr>";
    
    }}
    echo "</table>";
    fclose($arquivo);
    ?>
    </body>
    </html>