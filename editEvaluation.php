<?php
    require_once 'config/connection.php';
    $infor = []; //array para armazenar as informaçoes da avaliacao caso o id seja encontrado
    //recebendo o id, caso nada ou um valor diferente for recebido(ou seja passado na url)é exibio um form vazio
    $id = filter_input(INPUT_GET, 'id');
    if($id){
        //caso exista um id, vai ser feito uma busca para comparar o id passado com id buscado
        $searchIdEvaluation = $connectionPDO->prepare("SELECT * FROM evaluation WHERE id = :id");
        $searchIdEvaluation->bindValue(':id', $id);
        $searchIdEvaluation->execute();
        if($searchIdEvaluation->rowCount() > 0){
            //preenchedo o array com dados so usuario caso o id passado seja igual ao encontrado
            $infor = $searchIdEvaluation->fetch(PDO::FETCH_ASSOC);
        }else{
            header("Location: listEvaluation.php");
            exit();
        }
    }else{
        header("Location: listEvaluation.php");
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
    <title>avaliação</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-5">CADASTRO DE AVALIAÇÃO</h1>
            <form action="saveEditEvaluation.php" method="POST">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="date_birth" class="form-label mt-4">DATA DE NASCIMENTO DO ALUNO</label>
                        <input type="date" name="date_birth" id="date_birth" value="<?=$infor['date_birth'];?>" class="form-control" required>  
                    </div>
                    <div class="col-lg-4">
                        <label for="weight" class="form-label mt-4">PESO DO ALUNO</label>
                        <input type="text" name="weight" id="weight"  value="<?=$infor['weight'];?>" class="form-control"  onkeyup="onlyNumber(this);" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="height" class="form-label mt-4">ALTURA DO ALUNO</label>
                        <input type="text" name="height" id="height"  value="<?=$infor['height'];?>" class="form-control" onkeyup="onlyNumber(this);" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="height" class="form-label mt-4">O ALUNO POSSUI ALGUMA COMORBIDADE ?</label>
                        <input type="text" name="comorbidity" id="comorbidity"  value="<?=$infor['comorbidity'];?>" class="form-control"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="height" class="form-label mt-4">QUAL ?</label>
                        <input type="text"  name="description_comorbidity" id="" value="<?=$infor['description_comorbidity'];?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="objective_student" class="form-label mt-4">OBJETIVO DO ALUNO</label>
                        <input type="text" name="objective_student" id="objective_student"  value="<?=$infor['objective_student'];?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="note" class="form-label mt-4">ANOTAÇÃO COMPLEMENTARES</label>
                        <input type="text" name="note" id="note" cols="30"  value="<?=$infor['note'];?>" r  class="form-control">
                    
                         <!-- passando o id -->
                         <input type="hidden" name="id" value="<?=$infor['id'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-danger mt-4" href="index.php">CANCELAR</a>
                        <button class="btn btn-primary mt-4" type="submit">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once 'footer.php'?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/validationNumberString.js"></script>
    <!-- <script src="assets/js/validationForms.js"></script> -->
</body>
</html>




