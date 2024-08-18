<?php
include("../connect/conn.php");

//Criar variavel para armazenar a marca
$marca = $_POST['marca'];

$sql = "INSERT INTO tbl_marca (idMarca, marca) VALUES (NULL, '$marca')";

$exc = $conn->query($sql);

if($exc){
    $resp = "Marca do veiculo gravado com sucesso!";
}else{
    $resp = "Erro - ao gravar marca do veiculo!";
    $resp = $resp.$conn->connect_error;
}

$conn->close();
echo $resp;
?>
<br>
<a href="todas-marcas.php">voltar</a>