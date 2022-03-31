<?php
require_once 'config/connection.php';
//A FUNCAO FILTER_INPUT, VERIFICA O TIPO DE METODO USADO E SE O CAMPO(VARIAVEL) FOI DEFINIDO. POIS RETORNA NULL CASO NÃO DEFINIDO, E FALSE SE O FILTRO FALHAR, E TRUE CASO DE CERTO
$id = filter_input(INPUT_POST, 'id');
$weight = filter_input(INPUT_POST, 'weight');
$height = filter_input(INPUT_POST, 'height');
$objective_student = filter_input(INPUT_POST, 'objective_student');
$note = filter_input(INPUT_POST, 'note');
$date_birth = filter_input(INPUT_POST, 'date_birth');
$comorbidity = filter_input(INPUT_POST, 'comorbidity');
$description_comorbidity = filter_input(INPUT_POST, 'description_comorbidity');

//APOS OBTER A VARIAVEL VERIFICO SE O VALOR FOI DEFINIDO(OU SEJA FOI RETORNADO TRUE)
if($weight && $height){
    $updateEvaluation = $connectionPDO->prepare("UPDATE evaluation SET weight = :weight, height = :height, objective_student = :objective_student, note = :note, date_birth = :date_birth, comorbidity = :comorbidity, description_comorbidity = :description_comorbidity WHERE id = :id");
    $updateEvaluation->bindValue(':weight', $weight);
    $updateEvaluation->bindValue(':height', $height);
    $updateEvaluation->bindValue(':objective_student', $objective_student);
    $updateEvaluation->bindValue(':note', $note);
    $updateEvaluation->bindValue(':date_birth',$date_birth);
    $updateEvaluation->bindValue(':comorbidity',$comorbidity);
    $updateEvaluation->bindValue(':description_comorbidity',$description_comorbidity);
    $updateEvaluation->bindValue(':id',$id);
    $updateEvaluation->execute();
    header('Location: listEvaluation.php');
}else{
    header("Location:listEvaluation.php");
    exit;
}