<?php
	include '../lib/functions.php';
    $crud     = new Crud;
  //  $id 	  = $_REQUEST['id'];
   // $idvalue  = $_REQUEST['idvalue'];

    $read     = $crud->Readdata('sparepart',null,null);


    	$encode = json_encode(array('result'=>$read));
    	$dicode = json_decode($encode, true);
    	echo $encode."</br>";
    	echo var_dump($dicode) ;
    	

    	 
 		 $data = json_decode($encode, true);

 		 $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
 		 var_dump($age);	


 		 }
  	
  //echo $data['1']['id_sparepart'];
?>
