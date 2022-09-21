<?php 
	
	$crud     	= new Crud;
    
  
    	if(isset($_POST["submit"])) 
    		{
    			$id 	 	=	$_POST['id'];
    			$tipemobil 	=	$_POST['tipemobil'];
    			$tipeengine =	$_POST['tipeengine'];
    			$price 	 	=	$_POST['price'];

    			$arrdata =  array('car_id' 			=> "'$id'" ,
    							 'type_car' 		=> "'$tipemobil'" ,
    							 'type_engine' 		=> "'$tipeengine'",
    							 'price' 			=> "'$price'"  );

    			$insert		= $crud->Create('car',$arrdata);

    			
    			
	    		if(!$insert) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=mobil";	</script> ';
	    			}
    		}

?>


<div class="container-fluid">
<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Tambah Mobil</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>ID Mobil</label>
						<input type="text" name="id" class="form-control" placeholder="ID Mobil" maxlength="5" value="" required="">
				 	</div>
				 	<div class="form-group">
						<label>Tipe Mobil</label>
						<input type="text" name="tipemobil" class="form-control" placeholder="Tipe Mobil" maxlength="50"  value="" required="">
	 				</div>
	 				<div class="form-group">
						<label>Tipe Engine</label>
						<input type="text" name="tipeengine" class="form-control" placeholder="Tipe Engine" maxlength="60"  value="" required="">
	 				</div>
				 	<div class="form-group">
						<label>Harga</label>
						<input type="number" name="price" class="form-control" placeholder="Harga" 	maxlength="11"  value="" required="">
						
				 	</div>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true"></i> Submit </button>
			<a class="btn btn-danger btn-md" href="?view=mobil">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>

	