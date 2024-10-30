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

            <form form method="post" action="conexao.php">

                <br>
                
                <label for="usuario" class="form-label">Usuario</label>

                <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="">

                
                <label for="sexo" class="form-label">Sexo</label>

                <input type="text" name="sexo" class="form-control" id="sexo" aria-describedby="">


                <label for="endereco" class="form-label">Endereço</label>

                <input type="text" name="endereco" class="form-control" id="endereco" aria-describedby="">
                

                <label for="telefone" class="form-label">Telefone</label>

                <input type="text" name="telefone" class="form-control" id="telefone" aria-describedby="">


                <label for="email" class="form-label">email</label>

                <input type="email" name="email" class="form-control" id="email" aria-describedby="">


                <label for="senha" class="form-label">Senha</label>
            
                <input type="text" name="senha" class="form-control" id="senha" aria-describedby="">
                

                <br><br><br>

                <button type="submit" class="btn btn-primary">Enviar</button>

            </form>


        </div>

    </body>

    

</html>