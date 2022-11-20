<?php
include ("../init.php");
use Models\Student;

$studentId = $_GET['studentId']??null;

try {
    if(isset($_GET['studentId'])){
        $student= new Student("","","", "", "", "", "", "");
        $student->setConnection($connection);
        $data = $student->getByStudentId($studentId);
        $all_students = $student->deleteStudent();
        echo "<script>window.location.href='index.php?information=3';</script>";
        exit();
    }
} catch (Exception $e) {
    echo "<script>window.location.href='index.php?error=" . $e->getMessage()  . "';</script>";
}
?>