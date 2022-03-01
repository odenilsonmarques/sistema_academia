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
    <title>situação pagamento</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ALUNO</th>
                        <th>REGISTRADO EM</th>
                        <th>STATUS</th>
                        <th>DATA DO PAGAMENTO</th>
                    </tr>
                    <?
                        $listStudentPayments = [];
                        $listSituationPayments = $connectionPDO->query("SELECT student.id_student,student.name,student.date_register,payment.id,payment.status,payment.date_payment FROM payment, student WHERE payment.id_student = student.id_student");
                        if($listSituationPayments->rowCount() > 0){
                            $listStudentPayments = $listSituationPayments->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listStudentPayments as $listStudentPayment){?>
                                <tr>
                                    <td><?=$listStudentPayment['name'];?></td>
                                    <td><?= date('d/m/Y', strtotime($listStudentPayment['date_register']));?></td>
                                    <td><?=$listStudentPayment['status'];?></td>
                                    <td><?= date('d/m/Y', strtotime($listStudentPayment['date_payment']));?></td>
                                    <td>editar</td>
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




