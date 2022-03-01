<?php
    include_once 'config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <a href="registerStudent.php">cadastro de estudante</a><br><br>
    <a href="registerPayment.php">pagamento</a><br><br>
    <a href="registerTeacher.php">cadastrar instrutor</a><br><br>
    <a href="registerEvaluation.php">cadastrar avaliação</a><br><br>
    <a href="listStudent.php">alunos</a><br><br>
    <a href="test.php">exibe div</a><br><br>
    <a href="situationStudent.php">situacao pagamento</a><br><br>

    <?php include_once 'footer.php'?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>