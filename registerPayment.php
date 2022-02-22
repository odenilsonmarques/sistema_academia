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
    <title>Pagamento</title>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="container">
        <div class="row">
            <h2 class="text-center mt-5">PAGAMENTO</h2>
            <form action="receivePayment.php" method="POST">
                <div class="row">
                    <div class="col-lg-12">
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
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="date_payment" class="form-label mt-3" >DATA DO PAGAMENTO</label>
                        <input type="date" name="date_payment" id="date_payment" class="form-control" required>  
                    </div>
                    <div class="col-lg-6">
                        <label for="value" class="form-label mt-3">VALOR</label><br>
                        <input type="text" name="value" id="value" class="form-control" onkeyup="onlyNumber(this);" placeholder="R$" required>
                    </div>
                    <input type="hidden" name="status" id="status" value="Pagamento efetuado" readOnly>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <a class="btn btn-danger mt-4" href="index.php">CANCELAR</a>
                        <input type="submit" value="LANCAR PAGAMENTO" class="btn btn-primary  mt-4">
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



