<?php

//this pulls the MongoDB driver from vendor folder
require_once  '../vendor/autoload.php';

//connect to MongoDB Database
$databaseConnection = new MongoDB\Client;

//connecting to specific database in mongoDB
$myDatabase = $databaseConnection->myDB;

//connecting to our mongoDB Collections
$userCollection = $myDatabase->users;

// if($userCollection){
// 	echo "Collection ".$userCollection." Connected";
// }
// else{
// 	echo "Failed to connect to Database/Collection";
// }

if(isset($_POST['signup'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phoneNo = $_POST['phoneNo'];
    $password = sha1($_POST['password']);
}

$data = array(
	"Nombres" => $fname,
	"Apellidos" => $lname,
	"E-mail" => $email,
	"nroMovil" => $phoneNo,
	"Contraseña" => $password
);

//insert into MongoDB Users Collection
$insert = $userCollection->insertOne($data);

if($insert){
	?>
		<center><h4 style="color: green;">Registrado Exitoso</h4></center>
		<center><a href="../index.php">Login</a></center>
	<?php
}
else{
	?>
		<center><h4 style="color: red;">Registro Fallido</h4></center>
		<center><a href="../signup.php">Intentar Otra vez</a></center>
	<?php
}

