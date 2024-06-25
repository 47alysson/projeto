<?php
require('conecta.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM jogos WHERE id = $id");
    $jogo = mysqli_fetch_assoc($result);
    
    if (!$jogo) {
        echo "Jogo não encontrado!";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $desenvolvedora = $_POST['desenvolvedora'];
    $genero = $_POST['gen'];
    $finalizado = $_POST['finalizado'];
    $plataforma = isset($_POST['plataforma']) ? implode(', ', $_POST['plataforma']) : '';
    $data = $_POST['data'];
    $tempo = $_POST['tempo'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE jogos SET nome='$nome', desenvolvedora='$desenvolvedora', genero='$genero', finalizado='$finalizado', plataforma='$plataforma', data_lancamento='$data', tempo='$tempo', descricao='$descricao' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<center><h1>Jogo atualizado com sucesso!</h1>";
        echo "<a href='visualiza_jogos.php'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "Erro ao atualizar jogo: " . mysqli_error($conn);
    }
    exit;
} else {
    echo "Requisição inválida!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="formulario.css" media="screen">
    <title>Editar Jogo</title>
</head>

<body>
    <div>
        <H1 id="titulo">Editar Jogo</H1>
        <p id="subtitulo"><strong>Preencha os dados com as informações sobre o jogo</strong></p>
        <br>
    </div>

    <form method="POST" action="editar_jogo.php">
        <input type="hidden" name="id" value="<?php echo $jogo['id']?>">
        <fieldset class="grupo">

            <div class="campo">
                <label for="nome"><strong>Nome do Jogo</strong></label>
                <input type="text" name="nome" id="nome" value="<?php echo isset($jogo['NOME']) ? $jogo['NOME'] : ''; ?>" required>
            </div>

            <div class="campo">
                <label for="desenvolvedora"><strong>Desenvolvedora</strong></label>
                <input type="text" name="desenvolvedora" id="desenvolvedora" value="<?php echo isset($jogo['DESENVOLVEDORA']) ? $jogo['DESENVOLVEDORA'] : ''; ?>" required>
            </div>

        </fieldset>
        <br>
        <div class="campo">
            <label><strong>Gênero do Jogo</strong></label>
            <label>
                <input type="radio" name="gen" value="acao-e-aventura" <?php echo (isset($jogo['GENERO']) && $jogo['GENERO'] == 'acao-e-aventura') ? 'checked' : ''; ?>>Ação e aventura
            </label>
            <label>
                <input type="radio" name="gen" value="rpg" <?php echo (isset($jogo['GENERO']) && $jogo['GENERO'] == 'rpg') ? 'checked' : ''; ?>>RPG
            </label>
            <label>
                <input type="radio" name="gen" value="esportes" <?php echo (isset($jogo['GENERO']) && $jogo['GENERO'] == 'esportes') ? 'checked' : ''; ?>>Esportes
            </label>
            <label>
                <input type="radio" name="gen" value="corrida" <?php echo (isset($jogo['GENERO']) && $jogo['GENERO'] == 'corrida') ? 'checked' : ''; ?>>Corrida
            </label>
            <label>
                <input type="radio" name="gen" value="estrategia" <?php echo (isset($jogo['GENERO']) && $jogo['GENERO'] == 'estrategia') ? 'checked' : ''; ?>>Estratégia
            </label>
            <label>
                <input type="radio" name="gen" value="luta" <?php echo (isset($jogo['GENERO']) && $jogo['GENERO'] == 'luta') ? 'checked' : ''; ?>>Luta
            </label>
        </div>
        <br>

        <div class="campo">
            <label for="finalizado"><strong>Já finalizou?</strong></label>
            <select id="finalizado" name="finalizado" required>
                <option selected disabled value="">Selecione</option>
                <option value="Sim" <?php echo (isset($jogo['FINALIZADO']) && $jogo['FINALIZADO'] == 'Sim') ? 'selected' : ''; ?>>Sim</option>
                <option value="Não" <?php echo (isset($jogo['FINALIZADO']) && $jogo['FINALIZADO'] == 'Não') ? 'selected' : ''; ?>>Não</option>
            </select>
        </div>
        <br>

        <fieldset class="grupo">
            <div id="check">
                <label><strong>Selecione a Plataforma</strong></label>
                <input type="checkbox" name="plataforma[]" id="opcao1" value="Playstation" <?php echo (isset($jogo['PLATAFORMA']) && strpos($jogo['PLATAFORMA'], 'Playstation') !== false) ? 'checked' : ''; ?>>
                <label for="opcao1">Playstation</label>
                <input type="checkbox" name="plataforma[]" id="opcao2" value="Xbox" <?php echo (isset($jogo['PLATAFORMA']) && strpos($jogo['PLATAFORMA'], 'Xbox') !== false) ? 'checked' : ''; ?>>
                <label for="opcao2">Xbox</label>
                <input type="checkbox" name="plataforma[]" id="opcao3" value="PC" <?php echo (isset($jogo['PLATAFORMA']) && strpos($jogo['PLATAFORMA'], 'PC') !== false) ? 'checked' : ''; ?>>
                <label for="opcao3">PC</label>
                <input type="checkbox" name="plataforma[]" id="opcao4" value="Nintendo" <?php echo (isset($jogo['PLATAFORMA']) && strpos($jogo['PLATAFORMA'], 'Nintendo') !== false) ? 'checked' : ''; ?>>
                <label for="opcao4">Nintendo</label>
                <input type="checkbox" name="plataforma[]" id="opcao5" value="Outro" <?php echo (isset($jogo['PLATAFORMA']) && strpos($jogo['PLATAFORMA'], 'Outro') !== false) ? 'checked' : ''; ?>>
                <label for="opcao5">Outro</label>
            </div>
        </fieldset>
        <br>

        <fieldset class="grupo">
            <div class="campo">
                <label for="data"><strong>Data de lançamento</strong></label>
                <input type="date" id="data" name="data" value="<?php echo isset($jogo['DATA_LANCAMENTO']) ? $jogo['DATA_LANCAMENTO'] : ''; ?>">
            </div>

            <div class="campo">
                <label for="tempo"><strong>Quanto tempo para finalizar (h)?</strong></label>
                <input type="number" id="tempo" name="tempo" style="width:3em" value="<?php echo isset($jogo['TEMPO']) ? $jogo['TEMPO'] : ''; ?>">
            </div>
        </fieldset>
        <br>

        <div class="campo">
            <label for="descricao"><strong>Escreva uma breve descrição sobre o jogo</strong></label>
            <br>
            <textarea name="descricao" id="descricao" rows="10" style="width:30em"><?php echo isset($jogo['DESCRICAO']) ? $jogo['DESCRICAO'] : ''; ?></textarea>
        </div>
        <br>
        <button class="botao" type="submit" onsubmit="">Salvar</button>

    </form>
</body>

</html>
