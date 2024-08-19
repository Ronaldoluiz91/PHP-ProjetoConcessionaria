<?php
//Criando uma conexão com banco de Dados
//Criando variaveis

$serverDB = "127.0.0.1:3306";
// ou
// $serverDB = "localhost"; | $serverDB = "localhost";

$userDB = "root";
$passwordDB = "";
$nameDB = "db_carro_tii06";

//Criando a conexão com MySQL via objeto mysql
$conn = @new mysqli(
    $serverDB, $userDB, $passwordDB, $nameDB
);

if($conn->connect_error){
    $resp = "Erro de conexão <br>";
    $resp = $resp.$conn->connect_errno;
    $resp = $resp. "<br>" . "Erro: ".$conn->connect_error;
}else{
    $resp = "Sucesso! <br>";
    $resp = $resp. "Host informado: ".$conn->host_info;
    $resp = $resp. "<br>"."Protocolo versão: ".$conn->protocol_version;

}

// echo $resp;



?>