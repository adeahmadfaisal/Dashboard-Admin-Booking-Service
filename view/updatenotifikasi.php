<?php 
    
    $id         =  $_GET['id'] ;
    $crud       = new Crud;
    $read       = $crud->Readdata('push_notif','push_id',$id);
  
        if(isset($_POST["submit"])) 
            {
                $arrdata    = array(

                                    
                                    "deskripsi='".$_POST['deskripsi']."'" ,
                                    "date='".$_POST['date']."'"
                                    
                                   );

              

                $update     = $crud->Update('push_notif',$arrdata,'push_id',$id);

                
                
                if(!$update)    {
                       echo "Gagal";
                   } else {
                  echo '  <script>
                           window.location = "?view=notifikasi";    </script> ';
                   }
         }



    
    foreach ($read as $notifikasi ) {
        
        $namakaryawan = $crud->Readdata('employee','id_karyawan',$notifikasi['id_karyawan']);
        
        	foreach ($namakaryawan as $key ) {
        
             	if($key['id_karyawan'] == $notifikasi['id_karyawan'] ) {

             		$nama = $key['name'];

        	   	}
           	}     
             
?>
<div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Notifikasi User</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" > 
                    <div class="form-group">
                        <label>Karyawan</label>
                        <input type="text" name="id_karyawan" class="form-control" placeholder="Input your event title" value="<?php echo $nama;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="datetime" name="date" class="form-control"  value="<?php echo $notifikasi['date'];?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" rows="4"><?php echo $notifikasi['deskripsi'];?></textarea>  
                    </div>
                    
                    
        



<?php } ?>

        <div class="btn-group float-right mt-2" role="group">
            <button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus" aria-hidden="true"></i> Update </button>
            <a class="btn btn-danger btn-md" href="?view=notifikasi">
                <i class="fa fa-times" aria-hidden="true"></i>Back</a>
        </div>
    </form>

    