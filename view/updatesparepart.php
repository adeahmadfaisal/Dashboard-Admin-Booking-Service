<?php 
	
	$id 		= $_GET['id'];
	$crud     	= new Crud;
    $read     	= $crud->Readdata('sparepart','id_sparepart',$id);
  
    	if(isset($_POST["submit"])) 
    		{
    			$arrdata 	= array(

    								"car_id='".$_POST['carid']."'" ,
    								"name_sparepart='".$_POST['nama']."'" ,
    								"harga='".$_POST['harga']."'" ,
    								"deskripsi='".$_POST['deskripsi']."'" 
    								
    							   );

    			$update		= $crud->Update('sparepart',$arrdata,'id_sparepart',$id);

    			
    			
	    		if(!$update) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=sparepart";	</script> ';
	    			}
    		}



	
	foreach ($read as $booking ) {
            $getidcar   = $crud->getcar($booking['car_id']);


            foreach ($getidcar as $id) {

                if ($booking['car_id'] == $id['car_id'])
                
                {
                    $namecar = $id['type_car'];
                }

            }
?>
<div class="container-fluid">
<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Update Spare Part</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>Id Spare Part</label>
						<input type="text" name="id" class="form-control" placeholder="Input your event title" value="<?php echo $booking['id_sparepart'];?>" readonly>
				 	</div>
				 	<div class="form-group">
						<label>Tipe Mobil</label>

						<select name="carid" class="form-control" id="sel1"" >
							<?php
								echo '<option value="'.$booking['car_id'].'" selected=" selected">'.$namecar.'</option>';
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
						<input type="text" name="nama" class="form-control"  value="<?php echo $booking['name_sparepart'];?>">
	 				</div>
	 				<div class="form-group">
						<label>Harga</label>
						<input type="number" name="harga" class="form-control"  value="<?php echo $booking['harga'];?>">
	 				</div>
				 	<div class="form-group">
						<label>Deskripsi</label>
						<textarea type="text" name="deskripsi" class="form-control" rows="4"  value=""><?php echo $booking['deskripsi']; ?>
						</textarea>
				 	</div>
	 	



<?php } ?>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true"></i> Update </button>
			<a class="btn btn-danger btn-md" href="?view=sparepart">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>

	