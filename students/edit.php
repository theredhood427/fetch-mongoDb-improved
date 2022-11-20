<?php
include ("../init.php");
use Models\Student;

$studentId = $_GET['studentId']??null;

$student= new Student("","","", "", "", "", "", "");
$student->setConnection($connection);
$student->getByStudentId($studentId);
$studentId = $student->getStudentId();
$firstName = $student->getFirstName();
$lastName = $student->getLastName();
$birthdate = $student->getBirthDate();
$address = $student->getAddress();
$program = $student->getProgram();
$contactNumber = $student->getContactNumber();
$emergencyContact = $student->getEmergencyContact();

$template = $mustache->loadTemplate('edit.mustache');
echo $template->render(compact('studentId', 'firstName', 'lastName', 'birthdate', 'address', 'program', 'contactNumber', 'emergencyContact'));

try {
    if(isset($_POST['studentId'])){
        $student= new Student("","","", "", "", "", "", "");
        $student->setConnection($connection);
        $student->getByStudentId($_POST['studentId']);

        $all_students = $student->editStudent($_POST['studentId'], $_POST['firstName'], $_POST['lastName'], $_POST['birthdate'], $_POST['address'], $_POST['program'], $_POST['contactNumber'], $_POST['emergencyContact']);
        echo "<script>window.location.href='index.php?information=2';</script>";
        exit();
    }
} catch (Exception $e) {
    echo "<script>window.location.href='index.php?error='" . $e->getMessage() . ";</script>";
    exit();
}



?>





