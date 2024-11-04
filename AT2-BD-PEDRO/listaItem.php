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

$id_vendedor = isset($_GET['id']) ? intval($_GET['id']) : 0;
var_dump($_POST);

$sql = "SELECT* FROM produto WHERE usuario_id = $id_vendedor";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Lista Produtos</h1>       
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col">Descrição</th> 
        <th scope="col">Id do vendedor</th>
        </tr>
    </thead>
    <?php
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
    ?>
    <tbody>
        <tr>
        <td><?php echo $row["id_produto"] ?></td>
        <td><?php echo $row["nome_produto"] ?></td>
        <td><?php echo $row["preco"] ?></td>
        <td><?php echo $row["descricao"] ?></td>
        <td><?php echo $row["usuario_id"] ?></td>
        <td>
          <a class="btn btn-primary btn-sm" href="detalhar.php?id=<?php echo $row['id_produto'] ?>" role="button">Detalhar</a>
          <a class="btn btn-success btn-sm" href="atualizar.php?id=<?php echo $row['id_produto'] ?>" role="button">Atualizar</a>    
          <a class="btn btn-danger btn-sm" href="excluir.php?id=<?php echo $row['id_produto'] ?>" role="button" onclick="return confirmDelete();">Excluir</a>
        </td>
        </tr>
    
    </tbody>
    <?php 
            }
          } else {
            echo "0 results";
          }
          $conn->close();
          ?>
    </table>
    </div>
   
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>

        function confirmDelete()
          
          {
            if(confirm("Tem certeza que deseja excluir?"))
            {
              console.log("Apertou ok.");
            
            }else
            {
              console.log("Apertou cancelar.");
            }
          }

    </script>

  </body>
</html>