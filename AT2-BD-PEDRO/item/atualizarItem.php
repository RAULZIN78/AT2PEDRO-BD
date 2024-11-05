<?php require 'homeItem.php' ?>  
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Substitua pela senha correta
$dbname = "caixaeconomica";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtém o ID do cliente da URL
$id_produto = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verifica se o formulário foi enviado para atualizar o cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeProduto = $conn->real_escape_string($_POST["nome_produto"]);
    $preco = $conn->real_escape_string($_POST["preco"]);
    $desc = $conn->real_escape_string($_POST["desc"]);
    

    // Atualiza o cliente no banco de dados
    $sql = "UPDATE produto SET nome_produto='$nomeProduto', preco='$preco', descricao='$desc' WHERE id_produto=$id_produto";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
        echo '<script>setTimeout(function(){ window.location.href = "../lista.php"; }, 1000);</script>';

    } else {
        echo "Erro ao atualizar cliente: " . $conn->error;
    }
}

// Busca os dados do cliente atual para exibir no formulário
$sql = "SELECT * FROM produto WHERE id_produto = $id_produto";
$result = $conn->query($sql);

// Verifica se o cliente foi encontrado
if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();
} else {
    echo "Produto não encontrado!";
    exit;
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atualizar Produto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <h1>Atualizar Produto</h1>
    <form action="atualizarItem.php?id=<?php echo $id_produto; ?>" method="POST">
      <div class="mb-3">
        <label for="nome_produto" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo htmlspecialchars($produto['nome_produto']); ?>" required>
      </div>
      <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="text" class="form-control" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="desc" name="desc" value="<?php echo htmlspecialchars($produto['descricao']); ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
      <a href="../lista.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>