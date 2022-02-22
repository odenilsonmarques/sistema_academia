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
    <title>avaliação</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-5">cadastro avaliação</h1>
            <form action="receiveEvaluation.php" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="student" class="form-label mt-3">ALUNO</label>
                        <select name="student" id="" class="form-select" autofocus required>
                            <option value="">SELECIONE O ALUNO</option>
                            <?php
                                $listStudents = [];
                                $listAllStudents = $connectionPDO->query("SELECT * FROM student");
                                if($listAllStudents->rowCount() > 0){
                                    $listStudents = $listAllStudents->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($listStudents as $listStudent){ ?>
                                        <option value="<?=$listStudent['id_student'];?>"><?=$listStudent['name'];?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="teacher" class="form-label mt-3">AVALIADOR</label>
                        <select name="teacher" id="" class="form-select" required>
                            <option value="">SELECIONE O  AVALIADOR</option>
                            <?php
                                $listTeachers = [];
                                $listAllTeachers = $connectionPDO->query("SELECT * FROM teacher");
                                if($listAllTeachers->rowCount() > 0){
                                    $listTeachers = $listAllTeachers->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($listTeachers as $listTeacher){ ?>
                                        <option value="<?=$listTeacher['id_teacher'];?>"><?=$listTeacher['name'];?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="date_birth" class="form-label mt-4">DATA DE NASCIMENTO DO ALUNO</label>
                        <input type="date" name="date_birth" id="date_birth" class="form-control" required>  
                    </div>
                    <div class="col-lg-4">
                        <label for="weight" class="form-label mt-4">PESO DO ALUNO</label>
                        <input type="text" name="weight" id="weight" class="form-control" onkeyup="onlyNumber(this);" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="height" class="form-label mt-4">ALTURA DO ALUNO</label>
                        <input type="text" name="height" id="height" class="form-control" onkeyup="onlyNumber(this);" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="height" class="form-label mt-4">O ALUNO POSSUI ALGUMA COMORBIDADE ?</label>
                        <select class="form-select" onchange="displayInput(this.value)" name="comorbidity" id="comorbidity" required>
                            <option value="">SELECIONE</option>
                            <option value="SIM">SIM</option>
                            <option value="NAO">NÃO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="description_comorbidity">
                        <label for="height" class="form-label mt-4">QUAL ?</label>
                        <input type="text"  name="description_comorbidity" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="objective_student" class="form-label mt-4">OBJETIVO DO ALUNO</label>
                        <textarea name="objective_student" id="objective_student" cols="30" rows="2"  class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="note" class="form-label mt-4">ANOTAÇÃO COMPLEMENTARES</label>
                        <textarea name="note" id="note" cols="30" rows="2"  class="form-control"></textarea>
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
    <script src="assets/js/validationForms.js"></script>
</body>
</html>




