<?php
    require_once 'config/connection.php';
    $infor = []; //array para armazenar as informaçoes do usuario caso o id seja encontrado
    //recebendo o id_student, caso nada ou um valor diferente for recebido(ou seja passado na url)é exibio um form vazio
    $id = filter_input(INPUT_GET, 'id_teacher');
    if($id){
        //caso exista um id, vai ser feito uma busca para comparar o id passado com id buscado
        $searchIdTeacher = $connectionPDO->prepare("SELECT * FROM teacher WHERE id_teacher = :id_teacher");
        $searchIdTeacher->bindValue(':id_teacher', $id);
        $searchIdTeacher->execute();
        if($searchIdTeacher->rowCount() > 0){
            //preenchedo o array com dados so usuario caso o id passado seja igual ao encontrado
            $infor = $searchIdTeacher->fetch(PDO::FETCH_ASSOC);
        }else{
            header("Location: listTeacher.php");
            exit();
        }
    }else{
        header("Location: listTeacher.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleForms.css">
    <title>edita instrutor</title>
</head>
<body>
    <?php include_once 'header.php'?>
        <div class="container">
            <div class="row">
                <h2 class="mt-5">Edita Instrutor</h2>
                <form action="saveEditTeacher.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name" class="form-label mt-3">NOME</label>
                            <input type="text" name="name" id="name" value="<?=$infor['name'];?>" class="form-control" maxlength="100" onKeypress="return onlyLetter(event)" required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone" class="form-label mt-3">TELEFONE</label>
                            <input type="tel" name="phone" id="phone" value="<?=$infor['phone'];?>" class="form-control" maxlength="13" placeholder="(99)99999-9999" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="email" class="form-label mt-3">EMAIL</label>
                            <input type="email" name="email" id="email" value="<?=$infor['email'];?>" readOnly class="form-control"  placeholder="nome@examplo.com" required>
                        </div>
                        <div class="col-lg-6" >
                            <label for="address" class="form-label mt-3">ENDEREÇO</label>
                            <input type="text" name="address" id="address" value="<?=$infor['address'];?>" class="form-control" required>
                        
                            <!-- passando o id -->
                            <input type="hidden" name="id_teacher" value="<?=$infor['id_teacher'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-danger mt-4" href="index.php">CANCELAR</a>
                            <button class="btn btn-primary mt-4" type="submit">SALVAR</button>
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




