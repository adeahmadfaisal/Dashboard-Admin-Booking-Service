<?php
include 'lib/functions.php';
$session 		= new Login;
$sessionstart 	= $session->FSession();
$crud			= new Crud;
$pending = $crud->Readchart('Pending');
$approve = $crud->Readchart('Approve');
$cancel = $crud->Readchart('Cancel');
$finish = $crud->Readchart('Finish');

include 'theme/header.php';
include 'theme/body.php';
include 'theme/footer.php';



?>
