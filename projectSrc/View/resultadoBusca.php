<?php
require_once '../Controller/auth_check.php';
require_once '../DAO/db_connect.php';
require_once '../DAO/DadosUsuario.php';
require_once '../DAO/BuscarFilmes.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/resultadoBusca.css">
    <link rel="stylesheet" href="css/navbar.css"> 
</head>
<body>
        <header>
            <div class="site-name">Movie Finder</div>
            <nav>
                <div class="left-section">
                    <a href="landing.php" class="categoria home-page">Home Page</a>
                    <a href="management.php" class="categoria home-page">Gestão</a>
                </div>
                <div class="right-section">
                    <a href="perfil.php"><?php echo $user['NOME'];?></a>
                    <a href="../Controller/logout.php">Sair</a>
                    <form method="POST" class="search-box" action="resultadoBusca.php">
                        <input type="text" name="busca" placeholder="Digite aqui">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </header>
    <div class="container">
        <?php
        if ($result->num_rows == 0) {
            echo '<p>Nenhum resultado encontrado</p>';
        } else {
            while ($dados = $result->fetch_assoc()) {
                echo '<div class="movie">';
                echo '<img src="https://image.tmdb.org/t/p/w500' . $dados['CAMINHO_POSTER'] . '" alt="' . htmlspecialchars($dados['TITLE'], ENT_QUOTES, 'UTF-8') . '">';
                echo '<div class="movie-details">';
                ?>
                <div class="movie-title">
                    <a href="detalhamento.php?id=<?php echo urlencode($dados['ID_FILME']); ?>">
                        <?php echo htmlspecialchars($dados['TITLE'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </div>
                <?php
                echo '<div class="movie-genre">' . htmlspecialchars($dados['GENEROS'], ENT_QUOTES, 'UTF-8') . '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
