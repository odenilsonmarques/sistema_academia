<?php
    require_once 'config/connection.php';
    $infor = []; //array para armazenar as informaçoes do usuario caso o id seja encontrado
    //recebendo o id_student, caso nada ou um valor diferente for recebido(ou seja passado na url)é exibio um form vazio
    $id = filter_input(INPUT_GET, 'id_student');
    if($id){
        //caso exista um id, vai ser feito uma busca para comparar o id passado com id buscado
        $searchIdStudent = $connectionPDO->prepare("SELECT * FROM student WHERE id_student = :id_student");
        $searchIdStudent->bindValue(':id_student', $id);
        $searchIdStudent->execute();
        if($searchIdStudent->rowCount() > 0){
            //preenchedo o array com dados so usuario caso o id passado seja igual ao encontrado
            $infor = $searchIdStudent->fetch(PDO::FETCH_ASSOC);
        }else{
            header("Location: listStudent.php");
            exit();
        }
    }else{
        header("Location: listStudent.php");
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
    <title>cadastro de aluno</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <h2 class="text-center mt-5">EDITAR DADOS DO ALUNO</h2>
            <form action="saveEditStudent.php" method="POST">
                <div  class="row"> 
                    <div class="col-12">
                        <label for="name" class="form-label mt-3">NOME</label>
                        <input type="text" name="name" id="name" value="<?=$infor['name'];?>" class="form-control" maxlength="100" onKeypress="return onlyLetter(event)" required autofocus>
                    </div>
                </div>
                <div  class="row">
                    <div class="col-lg-6">
                        <label for="phone" class="form-label mt-3">TELEFONE</label>
                        <input type="tel" name="phone" id="phone" value="<?=$infor['phone'];?>" class="form-control" maxlength="13" placeholder="(99)99999-9999" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label  mt-3">EMAIL (OPCIONAL)</label>
                        <input type="email" name="email" id="email" value="<?=$infor['email'];?>" readOnly class="form-control" placeholder="nome@examplo.com">
                    </div>
                </div>
                <div  class="row">
                    <div class="col-lg-6">
                        <label for="address" class="form-label  mt-3">ENDEREÇO</label>
                        <input type="text" name="address" id="address" value="<?=$infor['address'];?>" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="age" class="form-label mt-3">IDADE (OPCIONAL)</label>
                        <input type="text" name="age" id="age" min="0" maxlength="3" value="<?=$infor['age'];?>"  class="form-control" onkeyup="onlyNumber(this);">
                    
                        <!-- passando o id -->
                        <input type="hidden" name="id_student" value="<?=$infor['id_student'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-danger mt-4" href="index.php">CANCELAR</a>
                        <input type="submit" value="SALVAR" class="btn btn-primary mt-4">
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



