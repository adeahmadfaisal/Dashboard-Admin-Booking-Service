<?php 
	
	$id 		= $_GET['id'];
	$crud     	= new Crud;
    $read     	= $crud->Readdata('car','car_id',$id);
  
    	if(isset($_POST["submit"])) 
    		{
    			$arrdata 	= array(

    								"car_id='".$_POST['id']."'" ,
    								"type_car='".$_POST['tipemobil']."'" ,
    								"type_engine='".$_POST['tipeengine']."'" ,
    								"price='".$_POST['price']."'" 
    								
    							   );

    			$update		= $crud->Update('car',$arrdata,'car_id',$id);

    			
    			
	    		if(!$update) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=mobil";	</script> ';
	    			}
    		}



	
	foreach ($read as $car ) {
            
?>
<div class="container-fluid">
<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Update Mobil</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>ID Mobil</label>
						<input type="text" name="id" class="form-control" placeholder="Input your event title" value="<?php echo $car['car_id'];?>" >
				 	</div>
				 	<div class="form-group">
						<label>Tipe Mobil</label>
						<input type="text" name="tipemobil" class="form-control"  value="<?php echo $car['type_car'];?>">
	 				</div>
	 				<div class="form-group">
						<label>Tipe Engine</label>
						<input type="text" name="tipeengine" class="form-control"  value="<?php echo $car['type_engine'];?>">
	 				</div>
				 	<div class="form-group">
						<label>Harga</label>
						<input type="number" name="price" class="form-control"  value="<?php
						echo $car['price']; ?>">
						
				 	</div>
	 	



<?php } ?>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true"></i> Update </button>
			<a class="btn btn-danger btn-md" href="?view=mobil">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>

	