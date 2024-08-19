<?php
//Importando arquivo de conexao ao banco de dados
include("../connect/conn.php");

//Criar uma variavel com a Query 'Comando em SQL' para consultar no banco de dados


$sql = "SELECT * FROM tbl_marca";
// $sql = "SELECT * FROM tbl_marca WHERE marca='TOYOTA'" ;
// $sql = "SELECT * FROM tbl_marca WHERE idMarca='3'" ;
// $sql = "SELECT * FROM tbl_marca WHERE idMarca=3 OR marca='FIAT'";

//Criar variavel para armazenar o objeto com metodo 'query'
$exc = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de marcas </title>
</head>

<body>
    <h1>Marcas da Agencia</h1>
    <table border=1 bgcolor=grey>
        <tr>
            <td>ID</td>
            <td>Marca</td>
        </tr>


        <?php

        if ($exc->num_rows > 0) {
            while ($row = $exc->fetch_assoc()) {
               $idMarca = $row["idMarca"];
               $marca = $row["marca"] ;
                echo "<tr>";
                echo "<td><a href='todos-modelos.php?marca=$marca'>".$idMarca."</a></td>";
                echo "<td><a href='todos-modelos.php?marca=$marca'>".$marca."</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Marca de carro não encontrada!";
        }


        $conn->close();
        ?>
        <hr>
        <h2>Adicionar nova Marca</h2>
        <form method="post" action="grava-marca.php">
            <label>Marca</label><br>
            <input type="text" name="marca" id="marca"><br>
            <input type="submit" value="gravar">
        </form>



</body>


</html>