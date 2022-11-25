<?php
   include "crud.php";
   require_once 'pessoas.php';
   $p = new Pessoas("agenda", "localhost:3307", "root", "");
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cadastro Pessoa</title>
      <link rel="stylesheet" type="text/css" href="estilo.css">
   </head>
   <body>
      <?php
         if (!isset($_POST["bt_sub"])) {
         ?>
      <div class="container">
         <br><br>
         <div class="container-left" id="esquerda">
            <form action="" method="POST">
               <h2>CADASTRO DE PESSOAS</h2>
               <div class="form-container">
                  <span class="input-label">Nome</span>
                  <input type="text" name="ds_nome" id="nome">
                  <br>
                  <span class="input-label">Sexo</span>
                  <br>
                  <input type="radio" name="cd_sexo" id="masc" value="M">
                  <span class="input-label-radio">masculino</span>
                  <br>
                  <input type="radio" name="cd_sexo" id="fem" value="F">
                  <span class="input-label-radio">feminino</span>
                  <br>
                  <input type="radio" name="cd_sexo" id="ndef" value="N">
                  <span class="input-label-radio">prefiro não informar</span>
                  <br><br>
                  <span class="input-label">Data de nascimento</span>
                  <input type="date" name="dt_nasc" id="dtnasc">
                  <br>
                  <span class="input-label">Telefone</span>
                  <input type="text" name="nr_telefone" id="telefone">
                  <br>
                  <span class="input-label">Email</span>
                  <input type="text" name="ds_email" id="email">
                  <br><br><br>
                  <div class="submit"><input type="submit" name="bt_sub" value="cadastrar"><br><br>
                  <a class="editar" href="form-editor.php">clique aqui para editar</a></div>
               </div>
               <?php
                  } else {
                      $ds_nome = $_POST["ds_nome"];
                      $cd_sexo = $_POST["cd_sexo"];
                      $dt_nasc = $_POST["dt_nasc"]; 
                      $nr_telefone = $_POST["nr_telefone"];
                      $ds_email = $_POST["ds_email"];
                  
                              try {
                                  $sql = 'INSERT INTO `agenda`.`pessoas` (`ds_nome`,`cd_sexo`,`dt_nasc`,`nr_telefone`,`ds_email`)  
                                  VALUES (:ds_nome,:cd_sexo,:dt_nasc,:nr_telefone,:ds_email);';
                                  
                                  $stmt = $PDO->prepare($sql);
                                  $stmt->bindParam(':ds_nome', $ds_nome);
                                  $stmt->bindParam(':cd_sexo', $cd_sexo);
                                  $stmt->bindParam(':dt_nasc', $dt_nasc);
                                  $stmt->bindParam(':nr_telefone', $nr_telefone);
                                  $stmt->bindParam(':ds_email', $ds_email);
                                  $stmt->execute();
                              
                                  if ($stmt->rowCount()>0) {
                                    header('Location: form.php');
                                      }
                                  } catch(PDOException $e) {
                                      echo 'Erro no banco de dados' . $e->getMessage();
                                  } catch(Exception $e) {
                                      echo 'Erro generico' . $e->getMessage();
                                  }
                              }
                  ?>
            </form>
         </div>
         <div class="container-right" id="direita">
            <table>
               <th colspan=6>PESSOAS CADASTRADAS</th>
               <tr>
                  <th>NOME</th>
                  <th>SEXO</th>
                  <th>DATA DE NASCIMENTO</th>
                  <th>CELULAR</th>
                  <th>EMAIL</th>
                  <th>AÇÔES</th>
               </tr>
               <?php
                  $dados = $p->buscarDados();
                  if(count($dados) > 0)
                  {
                      for ($i=0; $i < count($dados); $i++)
                      {
                          echo "<tr>";
                          foreach ($dados[$i] as $key => $value)
                          {
                              if($key !="id_pessoa")
                              {
                                  echo "<td>".$value."</td>";
                              }
                          }
                          ?>
               <td>
                  <a class="a-dois" href="form.php?id_pessoa=<?php echo $dados[$i]['id_pessoa'];?>">deletar</a>
                  <?php
                     if(isset($_GET['id_pessoa']) && !empty($_GET["id_pessoa"])){
                         $id_pessoa = addslashes($_GET['id_pessoa']);
                         $p->excluirPessoa($id_pessoa);
                         header('Location: form.php');
                     }
                     ?>
                  <a class="a-dois" href="form-editor.php?id_pessoa=<?php echo $dados[$i]['id_pessoa'];?>">alterar</a>

               </td>
               <?php
                  echo "</tr>";
                  }
                  }
                  ?>
            </table>
         </div>
      </div>
   </body>
</html>