<?php
//Importando arquivo de conexao ao banco de dados
include("../connect/conn.php");

$marca = $_GET['marca'];

//Criar uma variavel com a Query 'Comando em SQL' para consultar no banco de dados


$sql = "SELECT idMarca FROM tbl_marca WHERE marca='$marca'";


//Criar variavel para armazenar o objeto com metodo 'query'
$exc = $conn->query($sql);

if ($exc->num_rows > 0) {
    while ($row = $exc->fetch_assoc())
        $idMarca = $row['idMarca'];
}

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos Modelos</title>
</head>

<body>
    <h1>Modelos das Marcas: <?= $marca ?></h1>
    <table border=1>
        <tr>
            <td>ID</td>
            <td>MODELO</td>
        </tr>


        <?php

        $sql = "SELECT * FROM tbl_modelo WHERE idMarca='$idMarca'";

        $exc = $conn->query($sql);

        if ($exc->num_rows > 0) {
            while ($row = $exc->fetch_assoc()) {
                $idModelo = $row["idModelo"];
                $modelo = $row["modelo"];
                echo "<tr>";
                echo "<td><a href ='todas-versoes.php?modelo=$modelo'>" . $idModelo . "</a></td>";
                echo "<td><a href ='todas-versoes.php?modelo=$modelo'>" . $modelo . "</a></td>";
                echo "</tr>";
            }
            echo " </table>";
        } else {

            echo "Modelos de veiculos não cadastrado para essa marca";
        }
        ?>
    </table>

    <form method="post" action="grava-modelo.php">
        <input type="hidden" name="idMarca" value="<?= $idMarca ?>">
        <input type="hidden" name="marca" value="<?= $marca ?>">

        <label for="modelo">Modelo do Veículo</label><br>
        <input type="text" name="modelo" id="modelo"><br>

        <input type="submit" value="Gravar">
    </form>
    <a href="todas-marcas.php">Voltar</a>


    <?php

    $conn->close();
    ?>






</body>


</html>