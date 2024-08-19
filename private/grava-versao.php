<?php

include("../connect/conn.php");


$versao = $_POST['versao'];
$idModelo = $_POST['idModelo'];

echo $versao;

$sql = "INSERT INTO tbl_versao (idVersao, versao, idModelo) VALUES (NULL, '$versao', '$idModelo')";


$exc = $conn->query($sql);

if($exc){
    $resp = "Gravado com sucesso";
}else {
    $resp = "Erro ao gravar modelo";
}
$conn->close();

?>
