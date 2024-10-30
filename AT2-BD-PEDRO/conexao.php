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

$id = $_POST["id"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO cliente (id, usuario, senha, email, sexo, endereco, telefone)
VALUES ('$id', '$usuario', '$senha ','$email','$sexo','$endereco','$telefone')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


header("Location: lista.php", true, 301);  


$conn->close();
?>