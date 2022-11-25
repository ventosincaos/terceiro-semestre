<?php
try {
$PDO = new PDO("mysql:dbname=agenda;host=localhost:3307","root","");
//echo 'conexão ok <br>';
}
catch (PDOException $e) {
    echo "error: com banco de dados" . $e->getMessage();
}
catch (Exception $e) {
    echo "error generico" . $e->getMessage();;
}
?>