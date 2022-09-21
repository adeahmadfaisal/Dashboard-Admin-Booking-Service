<?php 


	$crud     	= new Crud;
    $read     	= $crud->Readvalidasi($_GET['id']);
  
    	if(isset($_POST["submit"])) 
    		{
    			$arrdata 	= array(

    								"date='".$_POST['date']."'" ,
    								"hour='".$_POST['hour']."'" ,
    								"type_service='".$_POST['type_service']."'" ,
    								"problem='".$_POST['problem']."'" ,
    								"status='".$_POST['status']."'"

    							   );

    			$update		= $crud->Update('booking_service',$arrdata,'booking_id',$_GET['id']);

    			
    			//var_dump($arrdata);
    			echo $_GET['id'];


	    		if(!$update) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=bookingvalidasi";	</script> ';
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
<h1 class="h3 mb-2 text-gray-800">Validasi Booking Service</h1>
<div class="card shadow mb-4">
<div class="card-body">
	<form method="post" > 
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="name" class="form-control" placeholder="Input your event title" value="<?php echo $booking['name'];?>" readonly>
	 	</div>
	 	<div class="form-group">
			<label>Merk Mobil</label>
			<input type="text" name="merkmobil" class="form-control"  value="<?php echo $namecar;?>" readonly>
	 	</div>
		<div class="form-group">
			<label>Tanggal</label>
			<input type="date" name="date" class="form-control"  value="<?php echo date('Y-m-d',strtotime($booking['date'])) ?>">
	 	</div>
	 	<div class="form-group">
			<label>Jam</label>
			<input type="time" name="hour" class="form-control"  value="<?php echo date('H:i',strtotime($booking['hour'])) ?>">
	 	</div>
	 	<div class="form-group">
			<label>Type Service</label>
			<input type="text" name="type_service" class="form-control"  value="<?php echo $booking['type_service']; ?>">
	 	</div>
	 	<div class="form-group">
			<label>Problem</label>
			<textarea  name="problem" class="form-control"  rows="4" value=""><?php echo $booking['problem']; ?></textarea>
		</div>
		<div class="form-group">
		<label>Status</label>

			<select name="status" class="form-control" id="sel1" >
				<?php
					if ($booking['status'] == "Pending"){
						echo '<option value="Pending">Pending</option>
							  <option value="Approve">Approve</option>
							  <option value="Cancel">Cancel</option>';
					}
					elseif ($booking['status'] == "Approve") {
						echo '<option value="Approve">Approve</option>
							  <option value="Cancel">Cancel</option>
							  <option value="Finish">Finish</option>'	;
					}
					elseif ($booking['status'] == "Cancel") 
					{
						echo '<option value="Cancel">Cancel</option>'	;	
					} else {
						echo '<option value="Finish">Finish</option>';

					}

				?>
				
				
		 	</select>
	 </div>


<?php } ?>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true"></i> Update </button>
			<a class="btn btn-danger btn-md" href="?view=bookingvalidasi">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>

	