<?php 
	
	$crud     	= new Crud;
    
  
    	if(isset($_POST["submit"])) 
    		{
    			$nama 	 	=	$_POST['nama'];
    			$email 		=	$_POST['email'];
    			$password 	=	$_POST['password'];
    			$level 	 	=	$_POST['level'];

    			$password 	= md5($password);

    			$arrdata =  array('name' 			=> "'$nama'" ,
    							 'email'	 		=> "'$email'" ,
    							 'password' 		=> "'$password'",
    							 'level' 			=> "'$level'"  );

    			$insert		= $crud->Create('employee',$arrdata);

    			
    			
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
	<h1 class="h3 mb-2 text-gray-800">Tambah User</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama Karyawan" value="">
				 	</div>
				 	<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email"  value="">
	 				</div>
	 				<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" placeholder="Password"  value="">
	 				</div>
	 				<div class="form-group">
						<label>Re-Password</label>
						<input type="text" name="repassword" class="form-control" placeholder="Re-Password"  value="">
	 				</div>
	 				<div class='alert' id="error">Passwor tidak sama !</div>
				 	<div class="form-group">
						<label>Level</label>
						<select name="level" class="form-control" id="sel1" > 
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
						
				 	</div>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md" id="submit" data-toggle="modal" data-target="#exampleModalCenter">
		  		<i class="fa fa-plus" aria-hidden="true" ></i> Submit </button>
			<a class="btn btn-danger btn-md" href="?view=mobil">
		  		<i class="fa fa-times" aria-hidden="true"></i>Back</a>
   	 	</div>
	</form>

	