<?php
require_once 'config/connection.php';
//A FUNCAO FILTER_INPUT, VERIFICA O TIPO DE METODO USADO E SE O CAMPO(VARIAVEL) FOI DEFINIDO. POIS RETORNA NULL CASO NÃO DEFINIDO, E FALSE SE O FILTRO FALHAR, E TRUE CASO DE CERTO
$id = filter_input(INPUT_POST, 'id_teacher');
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

//APOS OBTER A VARIAVEL VERIFICO SE O VALOR FOI DEFINIDO(OU SEJA FOI RETORNADO TRUE)
if($id && $name && $phone && $email && $address){
    $updateTeacher = $connectionPDO->prepare("UPDATE teacher SET name = :name, phone = :phone, email = :email, address = :address WHERE id_teacher = :id_teacher");
    $updateTeacher->bindValue(':name', $name);
    $updateTeacher->bindValue(':phone', $phone);
    $updateTeacher->bindValue(':email', $email);
    $updateTeacher->bindValue(':address', $address);
    $updateTeacher->bindValue(':id_teacher',$id);
    $updateTeacher->execute();
    header('Location:listTeacher.php');
}else{
    header("Location:listTeacher.php");
    exit;
}