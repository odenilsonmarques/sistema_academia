<?php
require_once 'config/connection.php';

$student = filter_input(INPUT_POST, 'student');
$date_payment = filter_input(INPUT_POST,'date_payment');
$value = filter_input(INPUT_POST,'value');
$status = filter_input(INPUT_POST,'status');

if($date_payment && $value){
    $insertPayment = $connectionPDO->prepare("INSERT INTO payment(id_student, date_payment, value, status) VALUE (:student, :date_payment, :value, :status)");
    $insertPayment->bindValue(':student', $student);
    $insertPayment->bindValue(':date_payment', $date_payment);
    $insertPayment->bindValue(':value', $value);
    $insertPayment->bindValue(':status', $status);
    $insertPayment->execute();
    header("Location: index.php");
    exit;
}else{
    header("Location:registerPayment.php");
    exit;
}

