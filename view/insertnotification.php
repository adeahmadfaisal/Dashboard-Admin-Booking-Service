<?php 
	
	$crud     	= new Crud;
    
  
    	if(isset($_POST["submit"])) 
    		{
    			
    			$nama 	 	=	$_SESSION['id'];
    			$judul 	 	=	$_POST['judul'];
    			$deskripsi 	 =	$_POST['deskripsi'];
    			$tanggal 	 =	$_POST['tanggal'];

    			$arrdata =  array('id_karyawan'		=> "'$nama'" ,
    							 'judul' 			=> "'$judul'" ,
    							 'deskripsi' 		=> "'$deskripsi'" ,
    							 'date' 			=> "'$tanggal'"  );

    			$insert		= $crud->Create('push_notif',$arrdata);
    			$Notifikasi = $crud->sendMessage($judul,$deskripsi);

    			
    			
	    		if(!$insert) 	{
	    				echo "Gagal";
	    			} else {
	    			echo '	<script>
    						window.location = "?view=notifikasi";	</script> ';
	    			}
    		}

?>


<div class="container-fluid">
<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Notifikasi</h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" > 
					<div class="form-group">
						<label>Nama Karyawan</label>
						<input type="text" name="nama" class="form-control"  value="<?php echo $_SESSION['username']; ?>">
	 				</div>
	 				<div class="form-group">
						<label>Judul Notifikasi</label>
						<input type="text" name="judul" class="form-control"  value="" maxlength="30">
	 				</div>
	 				<div class="form-group">
						<label>Deskripsi Notifikasi</label>
						<textarea type="deskripsi" name="deskripsi" class="form-control"   rows="4"  value="" maxlength="255"></textarea>
	 				</div>
				 	<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tanggal" class="form-control" value="">
						
				 	</div>

	 	<div class="btn-group float-right mt-2" role="group">
			<button type="submit" name="submit" class="btn btn-primary btn-md" onclick="return checknotifikasi()">
		  		<i class="fa fa-plus" aria-hidden="true"></i> Simpan </button>
			<button class="btn btn-danger btn-md" >
		  		<i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
   	 	</div>
	</form>

	