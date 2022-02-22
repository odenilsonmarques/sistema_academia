<?php
require_once 'config/connection.php';

$name = filter_input(INPUT_POST,'name');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

if($name && $phone){
    $verifyEmail = $connectionPDO->prepare("SELECT email FROM teacher WHERE email = :email");
    $verifyEmail->bindValue(':email', $email);
    $verifyEmail->execute();
    if($verifyEmail->rowCount() == 0){
        $insertTeacher = $connectionPDO->prepare("INSERT INTO teacher(name, phone, email, address)VALUE(:name, :phone, :email, :address)");
        $insertTeacher->bindValue(':name', $name);
        $insertTeacher->bindValue(':phone', $phone);
        $insertTeacher->bindValue(':email', $email);
        $insertTeacher->bindValue(':address', $address);
        $insertTeacher->execute();
        header("Location:index.php");
        exit;
    }else{
        echo "email ja existe";
        exit;
    }
}else{
    header("Location:registerTeacher.php");
    exit;
}