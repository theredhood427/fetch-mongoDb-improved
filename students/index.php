<?php
include ("../init.php");
use Models\Student;


$student= new Student("","","", "", "", "", "", "");
$student->setConnection($connection);
$all_students = $student->getAllStudents();

$template = $mustache->loadTemplate('index.mustache');
echo $template->render(compact('all_students', 'information'));

?>