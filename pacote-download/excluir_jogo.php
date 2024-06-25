<?php
require('conecta.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM JOGOS WHERE ID = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<center><h1>Jogo excluído com sucesso!</h1>";
        echo "<a href='visualiza_jogos.php'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "Erro ao excluir jogo: " . mysqli_error($conn);
    }
} else {
    echo "ID de jogo não fornecido!";
}
?>
