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
    <title>Instrutores</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-3">Instrutores</h2>
                <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>TELEFONE</th>
                        <th>AÇÃO</th>
                    </tr>
                </thead>
                   
                    <?php
                        $listTeachers = [];
                        //nesse caso usar o query, pois vai listar vai dados
                        $listAllTeachers = $connectionPDO->query("SELECT * FROM teacher");
                        if($listAllTeachers->rowCount() > 0){
                            $listTeachers = $listAllTeachers->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listTeachers as $listTeacher){ ?>
                                <tr>
                                    <td><?= $listTeacher['name'];?></td>
                                    <td><?= $listTeacher['phone'];?></td>
                                    <td><?= $listTeacher['email'];?></td>
                                    <td>
                                        <a href="deletTeacher.php?id_teacher=<?= $listTeacher['id_teacher'];?>" onclick="return confirm('CONFIRMAR EXCLUSÃO ?')" class="btn btn-danger btn-sm">Excluir</a>
                                        <a href="editTeacher.php?id_teacher=<?= $listTeacher['id_teacher'];?>"  class="btn btn-primary btn-sm">Editar</a>
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



