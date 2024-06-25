<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização dos Jogos</title>
</head>
<body>
    <center>
        <h1>Jogos Cadastrados</h1>

        <table border="4">
            <tr>
                <td>NOME</td>
                <td>DESENVOLVEDORA</td>
                <td>GENERO</td>
                <td>DATA DE LANÇAMENTO</td>
                <td>AÇÃO</td>
            </tr>
            <?php
                require("conecta.php");
                $dados_select = mysqli_query($conn, "SELECT ID, NOME, DESENVOLVEDORA, GENERO, DATA_LANCAMENTO FROM JOGOS");

                while ($dado = mysqli_fetch_array($dados_select)){
                    echo '<tr>';
                    echo '<td>'.$dado['1'].'</td>';
                    echo '<td>'.$dado['2'].'</td>';
                    echo '<td>'.$dado['3'].'</td>';
                    echo '<td>'.$dado['4'].'</td>';
                    echo '<td>';
                    echo '<a href="editar_jogo.php?id='.$dado['ID'].'"><button>Editar</button></a>';
                    echo '<a href="excluir_jogo.php?id='.$dado['ID'].'" onclick="return confirm(\'Tem certeza que deseja excluir este jogo?\')"><button>Excluir</button></a>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <br>
        <a href="index.html"><input type="button" value="voltar"></a>
    </center>
</body>
</html>
