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
    <title>Avaliações</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-3">Avaliações</h2>
                <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ALUNO</th>
                        <th>PESO</th>
                        <th>ALTURA</th>
                        <th>DATA</th>
                        <th>INSTRUTOR</th>
                        <th>AÇÃO</th>
                    </tr>
                </thead>
                   
                    <?php
                        $listEvaluations = [];
                        //nesse caso usar o query, pois vai listar vai dados
                        $searchEvaluatios = $connectionPDO->query("SELECT student.id_student, student.name, teacher.id_teacher,teacher.nameTeacher, evaluation.id, evaluation.weight, evaluation.height, evaluation.date_avaluation FROM evaluation, teacher, student WHERE evaluation.id_student = student.id_student AND evaluation.id_teacher = teacher.id_teacher");
                        if($searchEvaluatios->rowCount() > 0){
                            $listEvaluations = $searchEvaluatios->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listEvaluations as $listEvaluation){ ?>
                                <tr>
                                    <td><?= $listEvaluation['name'];?></td>
                                    <td><?= $listEvaluation['weight'];?></td>
                                    <td><?= $listEvaluation['height'];?></td>
                                    <td><?= date('d/m/Y', strtotime($listEvaluation['date_avaluation']));?></td>
                                    <td><?= $listEvaluation['nameTeacher'];?></td>
                                    <td>
                                        <!-- <a href="deletStudent.php?id_student=<?=$listStudent['id_student'];?>" onclick="return confirm('CONFIRMAR EXCLUSÃO ?')" class="btn btn-danger btn-sm">Excluir</a> -->
                                        <a href="deletEvaluation.php?id=<?=$listEvaluation['id'];?>" onclick="return confirm('CONFIRMAR EXCLUSÃO ?')" class="btn btn-danger btn-sm">Excluir</a>
                                        <a href="editEvaluation.php?id=<?= $listEvaluation['id'];?>"  class="btn btn-primary btn-sm">Editar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>



