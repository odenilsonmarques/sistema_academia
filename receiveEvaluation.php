<?php
require_once 'config/connection.php';
$student = filter_input(INPUT_POST, 'student');
$teacher = filter_input(INPUT_POST, 'teacher');
$weight = filter_input(INPUT_POST, 'weight');
$height = filter_input(INPUT_POST, 'height');
$objective_student = filter_input(INPUT_POST, 'objective_student');
$note = filter_input(INPUT_POST, 'note');
$date_birth = filter_input(INPUT_POST, 'date_birth');
$comorbidity = filter_input(INPUT_POST, 'comorbidity');
$description_comorbidity = filter_input(INPUT_POST, 'description_comorbidity');

if($weight && $height){
    $insertEvaluation = $connectionPDO->prepare("INSERT INTO evaluation(id_student, id_teacher, weight, height, objective_student, note, date_birth, comorbidity, description_comorbidity)VALUE(:student, :teacher, :weight, :height, :objective_student, :note, :date_birth, :comorbidity, :description_comorbidity)");
    $insertEvaluation->bindValue(':student', $student);
    $insertEvaluation->bindValue(':teacher', $teacher);
    $insertEvaluation->bindValue(':weight', $weight);
    $insertEvaluation->bindValue(':height', $height);
    $insertEvaluation->bindValue(':objective_student', $objective_student);
    $insertEvaluation->bindValue(':note', $note);
    $insertEvaluation->bindValue(':date_birth', $date_birth);
    $insertEvaluation->bindValue(':comorbidity', $comorbidity);
    $insertEvaluation->bindValue(':description_comorbidity', $description_comorbidity);
    $insertEvaluation->execute();
    header("Location:index.php");
    exit;
}else{
    header("Location:registerEvaluation.php");
}
