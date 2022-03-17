<?php
require_once 'config/connection.php';
//A FUNCAO FILTER_INPUT, VERIFICA O TIPO DE METODO USADO E SE O CAMPO(VARIAVEL) FOI DEFINIDO. POIS RETORNA NULL CASO NÃO DEFINIDO, E FALSE SE O FILTRO FALHAR, E TRUE CASO DE CERTO
$id = filter_input(INPUT_POST, 'id_student');
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$age = filter_input(INPUT_POST, 'age');

//APOS OBTER A VARIAVEL VERIFICO SE O VALOR FOI DEFINIDO(OU SEJA FOI RETORNADO TRUE)
if($id && $name && $phone && $email && $address && $age){
    $updateStudent = $connectionPDO->prepare("UPDATE student SET name = :name, phone = :phone, email = :email, age = :age WHERE id_student = :id_student");
    $updateStudent->bindValue(':name', $name);
    $updateStudent->bindValue(':phone', $phone);
    $updateStudent->bindValue(':email', $email);
    $updateStudent->bindValue(':age', $age);
    $updateStudent->bindValue(':id_student',$id);
    $updateStudent->execute();
    header('Location: listStudent.php');
}else{
    header("Location:listStudent.php");
    exit;
}