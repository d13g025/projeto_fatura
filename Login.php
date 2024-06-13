<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <style>
        body{
            background: rgb(63,94,251);
            background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
        }
        h1{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="row pt-5"></div>
    <div class="row">
        <div class="col-4 p-5"></div>
        <div class="col-4 p-5 mx-auto bg-light rounded">
            <div class="mx-auto align-items-center ">
            <form action="./config/Login_bd.php" method="POST">
                <h1 class="text-center">BEM VINDO</h1>
                <div class="mb-3 w-100">
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input type="email" class="form-control" id="login" name="login" placeholder="user@example.com">
                </div>
                <div class="mb-3 w-100">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="senha" name="senha" class="form-control" aria-describedby="passwordHelpBlock">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row"></div>
</body>

</html>