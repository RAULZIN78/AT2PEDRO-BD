<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caixaeconomica";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se o ID está definido na URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Converte o ID para um inteiro para evitar SQL Injection

    // Prepara e executa a consulta de exclusão
    $sql = "DELETE FROM produto WHERE id_produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Se a exclusão for bem-sucedida, redireciona para lista.php
        header("Location: ../lista.php?message=Registro excluído com sucesso.");
        exit; // Encerra o script após redirecionar
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID não especificado.";
}

$conn->close();
?>
