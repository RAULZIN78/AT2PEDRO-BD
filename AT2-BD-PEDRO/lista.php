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

$sql = "SELECT* FROM cliente";
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
    <h1>Lista</h1>       
    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">usuario</th>
        <th scope="col">email</th>
        <th scope="col">senha</th>
        <th scope="col">sexo</th>
        <th scope="col">telefone</th>
        <th scope="col">endereco</th>
        </tr>
    </thead>
    <?php
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
    ?>
    <tbody>
        <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["usuario"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["senha"] ?></td>
        <td><?php echo $row["sexo"] ?></td>
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["endereco"] ?></td>
        <td>
          <a class="btn btn-primary btn-sm" href="detalhar.php?id=<?php echo $row['id'] ?>" role="button">Detalhar</a>
          <a class="btn btn-success btn-sm" href="atualizar.php?id=<?php echo $row['id'] ?>" role="button">Atualizar</a>    
          <a class="btn btn-danger btn-sm" href="excluir.php?id=<?php echo $row['id'] ?>" role="button" onclick="return confirmDelete();">Excluir</a> 
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