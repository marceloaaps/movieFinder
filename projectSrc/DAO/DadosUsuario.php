<?php
    // Verificar se o email está armazenado na sessão
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        try {
            // Preparar a consulta SQL para obter o nome associado ao email
            $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE EMAIL = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            
            // Obter resultado da consulta
        $result = $stmt->get_result();
        
        // Verificar se encontrou algum resultado
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
        }
        
        // Fechar a consulta
        $stmt->close();
    } catch(mysqli_sql_exception $e) {
        echo 'Erro ao consultar o banco de dados: ' . $e->getMessage();
    }
    } else {
    echo "Usuário desconhecido";
    }   


?>