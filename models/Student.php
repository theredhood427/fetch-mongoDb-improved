<?php
namespace Models;

include "../init.php";

class Student
{ 
    protected $student_id;
    protected $first_name;
    protected $last_name;
    protected $birth_date;
    protected $address;
    protected $program;
    protected $contact_number;
    protected $emergency_contact;

    public function __construct($student_id, $first_name, $last_name, $birth_date, $address, $program, $contact_number, $emergency_contact){
		$this->student_id = $student_id;
		$this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birth_date = $birth_date;
        $this->address = $address;
        $this->program = $program;
        $this->contact_number = $contact_number;
        $this->emergency_contact = $emergency_contact;
        
	}

    public function getStudentId(){
        return $this->student_id;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getBirthDate(){
        return $this->birth_date;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getProgram(){
        return $this->program;
    }

    public function getContactNumber(){
        return $this->contact_number;
    }

    public function getEmergencyContact(){
        return $this->emergency_contact;
    }

    public function setConnection($connection){
        $this->connection = $connection;
    }

    public function getByStudentId($student_id){
        try {
            $data= $this->connection->find([
                'studentId' => $student_id
            ]);
            foreach($data as $row){
            $this->student_id = $row['studentId'];
            $this->first_name = $row['firstName'];
			$this->last_name = $row['lastName'];
			$this->birth_date = $row['birthdate'];
			$this->address = $row['address'];
            $this->program = $row['program'];
			$this->contact_number = $row['contactNumber'];
			$this->emergency_contact = $row['emergencyContact'];
            }
            return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
    }

    public function getAllStudents(){
        try{
            $data = $this->connection->find();
            return ($data);
        }
        catch (Exception $e) {
			error_log($e->getMessage());
		}
    }

    public function addStudent(){
        try{
            $data = $this->connection->insertOne([
                'studentId' => $this->student_id,
                'firstName' => $this->first_name,
                'lastName' => $this->last_name,
                'birthdate' => $this->birth_date,
                'address' => $this->address,
                'program' => $this->program,
                'contactNumber' => $this->contact_number,
                'emergencyContact' => $this->emergency_contact,
            ]);
            return ($data);
        }
        catch (Exception $e) {
			error_log($e->getMessage());
		}
    }

    public function deleteStudent(){
        try{
            $result = $this->connection->deleteOne([
                'studentId' => $this->student_id
            ]);
            return ($result);
        }
        catch (Exception $e) {
			error_log($e->getMessage());
		}
    }

    public function editStudent($student_id, $first_name, $last_name, $birth_date, $address, $program, $contact_number, $emergency_contact){
        try{
            $result = $this->connection->updateOne(
                ['studentId' => $this->student_id],
                ['$set' => [
                    'studentId' => $student_id,
                    'firstName' => $first_name,
                    'lastName' => $last_name,
                    'birthdate' => $birth_date,
                    'address' => $address,
                    'program' => $program,
                    'contactNumber' => $contact_number,
                    'emergencyContact' => $emergency_contact

                ]]
            );
            return ($result);
        }
        catch (Exception $e) {
			error_log($e->getMessage());
		}
    }

}
