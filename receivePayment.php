<?php
require_once 'config/connection.php';

$student = filter_input(INPUT_POST, 'student');
// $date_payment = filter_input(INPUT_POST,'date_payment');
$month = filter_input(INPUT_POST,'month');
$value = filter_input(INPUT_POST,'value');
$status = filter_input(INPUT_POST,'status');

if($month && $value){
    $insertPayment = $connectionPDO->prepare("INSERT INTO payment(id_student, month, value, status) VALUE (:student, :month, :value, :status)");
    $insertPayment->bindValue(':student', $student);
    // $insertPayment->bindValue(':date_payment', $date_payment);
    $insertPayment->bindValue(':month', $month);
    $insertPayment->bindValue(':value', $value);
    $insertPayment->bindValue(':status', $status);
    $insertPayment->execute();
    header("Location: index.php");
    exit;
}else{
    header("Location:registerPayment.php");
    exit;
}

