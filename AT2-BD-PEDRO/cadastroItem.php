<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>


    <body>
        
        <div class="container">

            <form method="post" action="conexaoItem.php">

                <br>
                
                <label for="nome_produto" class="form-label">Nome</label>

                <input type="text" name="nome_produto" class="form-control" id="nome_produto" aria-describedby="">

                
                <label for="preco" class="form-label">Preço</label>

                <input type="text" name="preco" class="form-control" id="preco" aria-describedby="">


                <label for="desc" class="form-label">Descrição</label>

                <input type="text" name="desc" class="form-control" id="desc" aria-describedby="">
                

                <input type="hidden" name="id_usuario" value="<?php echo isset($_GET['id']) ? intval($_GET['id']) : 0; ?>">

                <br><br><br>

                <button type="submit" class="btn btn-primary">Enviar</button>

            </form>


        </div>

    </body>

    

</html>