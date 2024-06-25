<?php
    require('conecta.php');

    $nome = $_POST['nome'];
    $desenvolvedora = $_POST['desenvolvedora'];
    $genero = $_POST['gen'];
    $finalizado = $_POST['finalizado'];
    $plataforma = isset($_POST['plataforma']) ? implode(', ',$_POST['plataforma']) : '' ;
    $data = $_POST['data'];
    $tempo = $_POST['tempo'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO jogos(nome, desenvolvedora, genero, finalizado, plataforma, data_lancamento, tempo, descricao)
    VALUES('$nome', '$desenvolvedora', '$genero', '$finalizado', '$plataforma', '$data', '$tempo', '$descricao')";

    if ($conn->query($sql)=== TRUE){
        echo"<center><h1>Registrado com Sucesso</h1>";
        echo"<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else{
        echo"<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>