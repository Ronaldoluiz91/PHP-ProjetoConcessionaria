<?php
include("../connect/conn.php");


$modelo = $_GET['modelo'];
// $marca = $GET['marca'];

$sql = "SELECT idModelo FROM tbl_modelo WHERE modelo='$modelo'";

$exc = $conn->query($sql);

if($exc->num_rows > 0){
while ($row = $exc->fetch_assoc()) {
    $idModelo = $row["idModelo"];
    
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Versões dos Modelos</title>
</head>

<body>
    <h1>Versões do Modelo: <?= $modelo ?> </h1>
    <table border=1>
        <tr>
            <td>ID</td>
            <td>Versão</td>
        </tr>
   
</body>

</html>

<?php

$sql = "SELECT * FROM tbl_versao WHERE idModelo='$idModelo'";


$exc = $conn->query($sql);

if ($exc->num_rows > 0) {
    while ($row = $exc->fetch_assoc()) {
        $idVersao = $row["idVersao"];
        $versao = $row["versao"];
        echo "<tr>";
        echo "<td><a href ='todas-cores.php?modelo=$versao'>" . $idVersao . "</a></td>";
        echo "<td><a href ='todas-cores.php?modelo=$versao'>" . $versao . "</a></td>";
        echo "</tr>";
       
    }
   
} else {
    echo "Versão não cadastrada para esse modelo !";
}

echo " </table>";
?>

<hr>

<form method="post" action="grava-versao.php">
        <input type="hidden" name="idModelo" value="<?= $idModelo ?>">
       

        <label for="modelo">Versão do Modelo <?=$modelo?></label><br>
        <input type="text" name="versao" id="versao"><br>

        <input type="submit" value="Gravar">
    </form>
    <a href="todos-modelo.php">Voltar</a>