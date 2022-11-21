<?php
Class Pessoas{
    private $pdo;
    public function __construct($dbname, $host, $user, $senha)
    {
            try {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            } 
            catch (PDOException $e) {
                echo "error: com banco de dados" . $e->getMessage();
            }
            catch (Exception $e) {
                echo "error generico" . $e->getMessage();
            }
    }
    public function  buscarDados(){
                {
                    $res = array();
                    $cmd = $this->pdo->query("SELECT * FROM pessoas ORDER BY ds_nome");
                    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
                    return $res;
                }
            }
    public function excluirPessoa($id_pessoa){
                    $cmd = $this->pdo->prepare("DELETE FROM pessoas WHERE id_pessoa=:id_pessoa");
                    $cmd->bindValue(":id_pessoa",$id_pessoa);
                    $cmd->execute();
                
            }
            public function lerPessoa($pdo, $id_pessoa){

                $sql = 'select ds_nome, ds_email, dt_nasc, cd_sexo, nr_telefone from tb_pessoa where id_pessoa = :id_pessoa';
            
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':id_pessoa', $id_pessoa);
                $statement->execute();
                return $statement->fetch(PDO::FETCH_ASSOC);
            
            }
}
?>