<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nome = $_POST['nome'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        
        function calculadora_nota($nota1, $nota2){
        $nota1 = str_replace(',', '.', $nota1);
        $nota2 = str_replace(',', '.', $nota2);

        $media = ($nota1 + $nota2)/2;
        $media = number_format((float)$media, 2, '.', ',');
        return $media;
        }

        function situacao($media){
        if ($media < 4.00){ 
            return "você está reprovado"; 

                } elseif ($media >= 4 && $media < 6.00) { 
                return "você precisa fazer o exame final"; 

                    } else { 
                return "você foi aprovado"; 
                } 
                }

            printf("Olá! " . $_POST['nome'] .", sua média é: ". calculadora_nota($nota1,$nota2) . " logo, ". situacao($media) .".");
    ?>
</body>
</html>