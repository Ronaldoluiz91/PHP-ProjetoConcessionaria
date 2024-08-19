<?php
include("../connect/conn.php");


$idMarca = $_POST['idMarca'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];

$sql = "INSERT INTO tbl_modelo(idModelo, modelo, idMarca) VALUES (NULL, '$modelo', '$idMarca')";
$exc = $conn->query($sql);

if($exc){
    $resp = "Gravado com sucesso";
}else {
    $resp = "Erro ao gravar modelo";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O modelo</title>
</head>
<body>
    <h1>O modelo <?=$modelo?> da Marca <?=$marca?></h1>
    <p><?=$resp?></p>
    <hr>
    <a href="todos-modelos.php?marca=<?=$marca?>">Voltar</a>
    
</body>
</html>