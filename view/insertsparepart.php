<?php 
	
	$crud     	= new Crud;
    
  
    	if(isset($_POST["submit"])) 
    		{
    			$id 	 =	$_POST['id'];
    			$carid 	 =	$_POST['carid'];
    			$nama 	 =	$_POST['nama'];
    			$harga 	 =	$_POST['harga'];
    			$deskripsi 	 =	$_POST['deskripsi'];

    			$arrdata =  array('id_sparepart'		=> "'$id'" ,
    							 'car_id' 				=> "'$carid'" ,
    							 'name_sparepart' 		=> "'$nama'" ,
    							 'harga' 				=> "'$harga'",
    							 'deskripsi' 			=> "'$deskripsi'"  );

    			$insert		= $crud->Create('sparepart',$arrdata);

    			
    			
	    		if(!$insert) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=sparepart";	</script> ';
	    			}
    		}

?>


<div class="container-fluid">
<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Spare Part</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>Id Spare Part</label>
						<input type="text" name="id" class="form-control" placeholder="ID sparepart" value="" maxlength="30" required>
				 	</div>
				 	<div class="form-group">
						<label>Merk Mobil</label>

						<select name="carid" class="form-control" id="sel1"" >
							<?php
								
								$getselect = $crud->Readdata('car',null,null);

				 					foreach ($getselect as $car) {
				 					echo '
										  
										  <option value="'.$car['car_id'].'">'.$car['type_car'].'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Spare Part</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama sparepart"  value="" maxlength="50" required>
	 				</div>
	 				<div class="form-group">
						<label>Harga</label>
						<input type="number" name="harga" class="form-control" placeholder="Harga sparepart"  value="" maxlength="10" required>
	 				</div>
				 	<div class="form-group">
						<label>Deskripsi</label>
						<textarea type="text" name="deskripsi" class="form-control" rows="4"  value="" maxlength="255" required>
						</textarea>
				 	</div>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true"></i> Simpan </button>
			<a class="btn btn-danger btn-md" href="?view=sparepart">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>

	