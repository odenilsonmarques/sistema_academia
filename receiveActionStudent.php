<?php
require_once 'config/connection.php';

$name = filter_input(INPUT_POST, 'name');

$phone = filter_input(INPUT_POST, 'phone');

$email = filter_input(INPUT_POST, 'email');

$address = filter_input(INPUT_POST, 'address');

$birth_date = filter_input(INPUT_POST, 'birth_date');

if($name && $email){

    $query = $connectionPDO->prepare("INSERT INTO student(name, phone, email, address, birth_date) VALUES (:name, :phone, :email, :address, :birth_date)");
    $query->bindValue(':name', $name);
    $query->bindValue(':phone', $phone);
    $query->bindValue(':email', $email);
    $query->bindValue(':address', $address);
    $query->bindValue(':birth_date', $birth_date);
    $query->execute();
    // header("Location:index.php");
    exit;
}else{
    header("Location:cadStudent.php");
    exit;
}