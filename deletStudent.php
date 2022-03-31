<?php
require_once 'config/connection.php';

$id = filter_input(INPUT_GET, 'id_student');

if($id){
    try{
        $searchStudent = $connectionPDO->prepare("DELETE FROM student WHERE id_student = :id_student");
        $searchStudent->bindValue(':id_student',$id);
        $searchStudent->execute();

    }catch(PDOException $e){
        echo "erro";
    }
   
}
    //caso aconteça ou não a exclusao ele sempre vai permanecer na lista. Porem poderia ser usado um else é apenas uma abordagem doferentes
    header("Location:listStudent.php");
    exit;

