<?php
require('conecta.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM JOGOS WHERE ID = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Jogo excluído com sucesso!";
        echo "<a href='visualiza_jogos.php'>Voltar</a>";
    } else {
        echo "Erro ao excluir jogo: " . mysqli_error($conn);
    }
} else {
    echo "ID de jogo não fornecido!";
}
?>
