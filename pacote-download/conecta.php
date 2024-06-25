<?php
    $servername = "localhost";
    $database = "projeto";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die("Conexão Falhou. Erro: ".mysqli_connect_error());
    }
?>