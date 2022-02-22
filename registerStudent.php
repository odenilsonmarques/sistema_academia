<?php
    require_once 'config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleForms.css">
    <title>cadastro de aluno</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <h2 class="text-center mt-5">CADASTRO DE ALUNO</h2>
            <form action="receiveStudent.php" method="POST">
                <div  class="row"> 
                    <div class="col-12">
                        <label for="name" class="form-label mt-3">NOME</label>
                        <input type="text" name="name" id="name" class="form-control" maxlength="100" onKeypress="return onlyLetter(event)" required autofocus>
                    </div>
                </div>
                <div  class="row">
                    <div class="col-lg-6">
                        <label for="phone" class="form-label mt-3">TELEFONE</label>
                        <input type="tel" name="phone" id="phone" class="form-control" maxlength="13" placeholder="(99)99999-9999" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label  mt-3">EMAIL (OPCIONAL)</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="nome@examplo.com">
                    </div>
                </div>
                <div  class="row">
                    <div class="col-lg-6">
                        <label for="address" class="form-label  mt-3">ENDEREÇO</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="age" class="form-label mt-3">IDADE (OPCIONAL)</label>
                        <input type="text" name="age" id="age" min="0" maxlength="3" class="form-control" onkeyup="onlyNumber(this);">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-danger mt-4" href="index.php">CANCELAR</a>
                        <input type="submit" value="CADASTRAR" class="btn btn-primary mt-4">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once 'footer.php'?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/validationNumberString.js"></script>
</body>
</html>


