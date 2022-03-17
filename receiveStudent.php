<?php
require_once 'config/connection.php';
//A FUNCAO FILTER_INPUT, VERIFICA O TIPO DE METODO USADO E SE O CAMPO(VARIAVEL) FOI DEFINIDO. POIS RETORNA NULL CASO NÃO DEFINIDO, E FALSE SE O FILTRO FALHAR, E TRUE CASO DE CERTO
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$age = filter_input(INPUT_POST, 'age');

//APOS OBTER A VARIAVEL VERIFICO SE O VALOR FOI DEFINIDO(OU SEJA FOI RETORNADO TRUE)
if($name && $phone){
    //VERIFICANDO SE JA EXISTE UM EMAIL IGUAL AO QUE ESTÁ SENDO CADASTRADO
    //USANDO o prepare, pois estou consultando um item especifico
    $verifyEmail = $connectionPDO->prepare("SELECT email FROM student WHERE email = :email");
    $verifyEmail->bindValue(':email', $email);
    $verifyEmail->execute();
    if($verifyEmail->rowCount() == 0){
        $insertStudent = $connectionPDO->prepare("INSERT INTO student(name, phone, email, address, age) VALUES (:name, :phone, :email, :address, :age)");
        //USANDO O METODO BINDVALUE PARA PASSAR OS PARAMENTO JA DEFINIDO($NAME, $PHONE...), POREM PODERIA SER PASSADO VALORES DIRETO (UM NOME, UM TELEFONE...) NO LGGAR DO PARAMETRO. ESSE METODO PERMITE ESSAS DUAS FORMAS
        $insertStudent->bindValue(':name', $name);
        $insertStudent->bindValue(':phone', $phone);
        $insertStudent->bindValue(':email', $email);
        $insertStudent->bindValue(':address', $address);
        $insertStudent->bindValue(':age', $age);
        $insertStudent->execute();
        header("Location:index.php");
        exit;
    }else{
        echo "email ja existe";
        exit;
    }
}else{
    header("Location:registerStudent.php");
    exit;
}