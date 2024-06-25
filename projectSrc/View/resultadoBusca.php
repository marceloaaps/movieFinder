<?php
require_once '../DAO/BuscarFilmes.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .movie {
            display: flex;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .movie img {
            max-width: 150px;
            margin-right: 20px;
            border-radius: 8px;
        }
        .movie-details {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .movie-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .movie-genre {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($result->num_rows == 0) {
            echo '<p>Nenhum resultado encontrado</p>';
        } else {
            while ($dados = $result->fetch_assoc()) {
                echo '<div class="movie">';
                echo '<img src="https://image.tmdb.org/t/p/w500' . $dados['CAMINHO_POSTER'] . '" alt="' . $dados['TITLE'] . '">';
                echo '<div class="movie-details">';
                echo '<div class="movie-title">' . $dados['TITLE'] . '</div>';
                echo '<div class="movie-genre">' . $dados['GENEROS'] . '</div>';
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
