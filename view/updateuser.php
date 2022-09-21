<?php 
	
	$id 		= $_GET['id'];
	$crud     	= new Crud;
    $read     	= $crud->Readdata('employee','id_karyawan',$id);
  

    	if(isset($_POST["submit"])) 
    		{
    			$password = md5($_POST['password']);
    			$arrdata 	= array(

    								"name='".$_POST['nama']."'" ,
    								"email='".$_POST['email']."'" ,
    								"password='".$password."'" ,
    								"level='".$_POST['level']."'" 
    								
    							   );

    			$update		= $crud->Update('employee',$arrdata,'id_karyawan',$id);

    			
    			
	    		if(!$update) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=user";	</script> ';
	    			}
    		}



	
	foreach ($read as $car ) {
            
?>
<div class="container-fluid">
<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Update User</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" placeholder="ID Mobil" value="<?php echo $car['name'];?>">
				 	</div>
				 	<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Tipe Mobil"  value="<?php echo $car['email'];?>">
	 				</div>
	 				<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" placeholder="Tipe Engine"  value="<?php echo $car['password'];?>">
	 				</div>
	 				<div class="form-group">
						<label>Re-Password</label>
						<input type="password" name="repassword" class="form-control" placeholder="Tipe Engine"  value="<?php echo $car['password'];?>">
	 				</div>
	 				<div class='alert' id="error">Passwor tidak sama !</div>
				 	<div class="form-group">
						<label>Level</label>
						<select name="level" class="form-control" id="sel1" > 
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
						
				 	</div>

<?php } ?>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md" id="submit" data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true" ></i> Submit </button>
			<a class="btn btn-danger btn-md" href="?view=mobil">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>
	