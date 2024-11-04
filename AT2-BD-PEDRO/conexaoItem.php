<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caixaeconomica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id_usuario = isset($_POST['id_usuario']) ? intval($_POST['id_usuario']) : 0;

$nomeProduto = $_POST["nome_produto"];
$preco = $_POST["preco"];
$desc = $_POST["desc"];

var_dump($_POST);

$sql = "INSERT INTO produto (nome_produto, preco, descricao, usuario_id)
VALUES ('$nomeProduto', '$preco', '$desc', '$id_usuario')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


header("Location: lista.php", true, 301);  


$conn->close();
?>