<?php
require_once 'config/connection.php';

$id = filter_input(INPUT_GET, 'id');

if($id){
    $searchEvaluatios = $connectionPDO->prepare("DELETE FROM evaluation WHERE id = :id");
    $searchEvaluatios->bindValue(':id',$id);
    $searchEvaluatios->execute();
}
    //caso aconteça ou não a exclusao ele sempre vai permanecer na lista. Porem poderia ser usado um else é apenas uma abordagem doferentes
    header("Location:listEvaluation.php");
    exit;

