<?php
   include "crud.php";
   require_once 'pessoas.php';
   $p = new Pessoas("agenda", "localhost", "root", "");
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Editar Cadastro</title>
      <link rel="stylesheet" type="text/css" href="estilo2.css">
   </head>
   <body>
   <?php

    if (!isset($_GET["bt_sub"])) {
        $id_pessoa = $_GET["id_pessoa"];
        $pessoa = lerPessoa($pdo, $id_pessoa);
    ?>
      <form  action="" method="get">
        <input type="hidden" name="id_pessoa" value="<?php echo $id_pessoa ?>">
        <label for="nome">Nome</label>
        <input type="text" name="ds_nome" id="nome" value="<?php echo $pessoa["ds_nome"]; ?>" >
        <br>
        <input type="radio" name="cd_sexo" id="masc" value="M" <?php echo $pessoa["cd_sexo"]=="M"?"checked":"" ?> >
        <label for="masc">Masculino</label>
        <input type="radio" name="cd_sexo" id="fem" value="F" <?php echo $pessoa["cd_sexo"]=="F"?"checked":"" ?> >
        <label for="fem">Feminino</label>
        <input type="radio" name="cd_sexo" id="ndef" value="N" <?php echo $pessoa["cd_sexo"]=="N"?"checked":"" ?> >
        <label for="ndef">Prefiro não informar</label>
        <br>
        <label for="dtnasc">Data Nascimento</label>
        <input type="date" name="dt_nasc" id="dtnasc" value="<?php echo $pessoa["dt_nasc"] ?>">
        <br>
        <label for="email">E-mail</label>
        <input type="text" name="ds_email" id="email" value="<?php echo $pessoa["ds_email"] ?>">
        <br>
        <label for="telefone">Telefone</label>
        <input type="text" name="nr_telefone" id="telefone"  value="<?php echo $pessoa["nr_telefone"] ?>">
        <br>
        <input type="submit" name="bt_sub" value="Alterar">
      </form>

    <?php

    } else {
      $id_pessoa = $_GET["id_pessoa"];
      $ds_nome = $_GET["ds_nome"];
      $cd_sexo = $_GET["cd_sexo"];
      $dt_nasc = $_GET["dt_nasc"]; # ano - mes - dia
      $nr_telefone = $_GET["nr_telefone"];
      $ds_email = $_GET["ds_email"];
  
      try {
          
          $sql = 'UPDATE `agenda`.`pessoas` (`ds_nome`,`cd_sexo`,`dt_nasc`,`nr_telefone`,`ds_email`) WHERE `id_pessoa` = :id_pessoa 
                                  VALUES (:ds_nome,:cd_sexo,:dt_nasc,:nr_telefone,:ds_email);';
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':ds_nome', $ds_nome);
          //echo '>>> >>>>'.$cd_sexo;
          $stmt->bindParam(':cd_sexo', $cd_sexo);
          $stmt->bindParam(':dt_nasc', $dt_nasc);
          $stmt->bindParam(':nr_telefone', $nr_telefone);
          $stmt->bindParam(':ds_email', $ds_email);
          $stmt->bindParam(':id_pessoa', $id_pessoa);
          $stmt->execute();
        
          if ($stmt->rowCount()>0) {
            echo "<p>Registro inserido com sucesso</p>"; 
          }
        } catch(PDOException $e) {
          echo 'Erro: ' . $e->getMessage();
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
                         header('Location: form-edit.php');
                     }
                     ?>
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