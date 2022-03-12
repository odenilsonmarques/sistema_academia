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
    <title>alunos</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ALUNO</th>
                        <th>TELEFONE</th>
                        <th>EMAIL</th>
                        <th>REGISTRADO EM</th>
                        <th>AÇÃO</th>
                    </tr>
                </thead>
                   
                    <?php
                        $listStudents = [];
                        $listAllStudents = $connectionPDO->query("SELECT * FROM student");
                        if($listAllStudents->rowCount() > 0){
                            $listStudents = $listAllStudents->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listStudents as $listStudent){ ?>
                                <tr>
                                    <td><?=$listStudent['name'];?></td>
                                    <td><?=$listStudent['phone'];?></td>
                                    <td><?=$listStudent['email'];?></td>
                                    <td><?= date('d/m/Y', strtotime($listStudent['date_register']));?></td>
                                    <td>
                                        <a href="deletStudent.php?id_student=<?=$listStudent['id_student'];?>" onclick="return confirm('CONFIRMAR EXCLUSÃO ?')" class="btn btn-danger btn-sm">Excluir</a>
                                        <a href="#" class="btn btn-primary btn-sm">Editar</a>

                                        <!-- <a href="editarProduto.php?id_products=<?=$produtos['id_products'];?>">Editar</a> -->
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



