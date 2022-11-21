<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
                    #arquivo {
                      font-family: Arial, Helvetica, sans-serif;
                      border-collapse: collapse;
                      width: 80%;
                      background-color: rgba(107, 49, 94, 0.303);
                      width: 90%;
                      line-height: 15px;
                    }
                    
                    #arquivo td, #arquivo th {
                      border: 1px solid rgba(19, 17, 17, 0.494);
                      padding: 8px;
                    }
                    
                    #arquivo th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #04AA6D;
                        color: white;
                    }

    </style>
    <title>Lista</title>
    
</head>

<body>

          <table  id="arquivo">
              <?php
              $abrir = fopen("formulario.txt", "r");

                  echo "<tr><td>Nome</td><td>Gênero</td><td>Data de Nascimento</td><td>Telefone</td><td>E-mail</td></tr>";

                          while(!feof($abrir)) {
                            $linha = json_decode(fgets($abrir),true);
                            if ($linha !=null) {echo"<tr>";
                              foreach($linha as $l){
                                  echo "<td>".$l."</td>";
                              }
                                  echo"</tr>";
                            }
                          }  
                                  echo "</table>";
                                  fclose($abrir);
              ?>

    </body>
    </html>