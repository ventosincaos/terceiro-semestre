<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
        function mascara(telefone){ 
            if(telefone.value.length == 0)
                telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
            
                if(telefone.value.length == 3)
                telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) 
                //o script irá inserir mais um parênteses, fechando assim o código de área.
 
            if(telefone.value.length == 10)
                telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, 
                //para melhor visualização do telefone.  
            }
    </script>

    <title>Document</title>
</head>

<body>

    <fieldset>
        <form action="script01.php" method="get">

            <label for="nome">nome:</label>
            <input type="text" name="nome" id="nome" placeholder="nome">
            <br>

            <label for="genero">genero:</label>
            <input type="radio" name="genero" value="masculino"> masculino
            <input type="radio" name="genero" value="feminino"> feminino
            <br>

            <label for="nascimento">data de nascimento:</label>
            <input type="date" name="nascimento" id="nascimento">
            <br>

            <label for="telefone">telefone:</label>
            <input type="text" name="telefone" id="telefone" placeholder="(99) 99999-9999" 
            maxlength="15" onkeypress="mascara(this)">
            <br>

            <label for="email">email:</label>
            <input type="email" name="email" id="email" placeholder="fulano@email.com">
            <br>

            <input type="submit" value="Enviar">
        </form>
    </fieldset>
    
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
    
</body>
</html>