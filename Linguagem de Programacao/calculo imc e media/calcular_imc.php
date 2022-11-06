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
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        
        function calculadora_imc($altura, $peso){
        $altura = str_replace(',', '.', $altura);
        $peso = str_replace(',', '.', $peso);

        $imc = $peso/pow($altura, 2);
        $imc = number_format((float)$imc, 2, '.', ',');
        return $imc;
        }

        function imc($imc){
        if ($imc < 17){ 
            return "fique alerta, você está muito abaixo do peso"; 
            } else{ 
            if ($imc >= 17 && $imc < 18.49){ 
                return "fique alerta pois você está abaixo do peso";

                } elseif ($imc >= 18.5 && $imc < 24.99) { 
                return "você está com peso normal"; 

                    } elseif ($imc >= 25 && $imc < 29.99) { 
                return "fique alerta, pois você está acima do peso"; 

                    } elseif ($imc>= 30 && $imc < 34.99) { 
                return "fique alerta, pois você está com obesidade grau I"; 

                } elseif ($imc >= 35 && $imc < 39.99) {
                return "fique alerta, pois você está com obesidade grau II (severa)"; 

                    } else { 
                return "fique alerta, pois você está com obesidade grau III (mórbida)"; 
                } 
                }}

            printf("Olá! " . $_POST['nome'] .", seu IMC é de: ". calculadora_imc($altura,$peso) . " logo, ". imc($altura,$peso) .".");
    ?>
</body>
</html>