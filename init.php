<?php
include "vendor/autoload.php";

use Models\Student;
use MongoDB\BSON\ObjectID;

$client = new MongoDB\Client('mongodb://localhost:27017');
$connection = $client->local->students;

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

$information = $_GET['information'] ?? null;

if ($information==1){
	$information  = "Added student successfully!";
}
if ($information==2){
	$information  = "Updated student record successfully!";
}

if ($information==3){
	$information  = "Deleted student sucessfully!";
}