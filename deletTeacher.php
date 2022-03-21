<?php
require_once 'config/connection.php';

$id = filter_input(INPUT_GET, 'id_teacher');

if($id){
    $searchStudent = $connectionPDO->prepare("DELETE FROM teacher WHERE id_teacher = :id_teacher");
    $searchStudent->bindValue(':id_teacher',$id);
    $searchStudent->execute();
}
    //caso aconteça ou não a exclusao ele sempre vai permanecer na lista. Porem poderia ser usado um else é apenas uma abordagem doferentes
    header("Location:listTeacher.php");
    exit;

