<?php 
    $crud     = new Crud;
    $read     = $crud->Readdata('push_notif',null,null);
    

?>

<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Notifikasi</h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Semua Notifikasi</h6>
</div>
<div class="card-body">
<div class="py-3">
  <a href="?add=notifikasi" class="btn btn-info" role="button">Tambah Data</a>  
</div>    
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
    <th>No</th>
    <th>Nama Karyawan</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th>Tanggal</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>


    <?php 

        $no = 1;
        foreach ($read as $notifikasi ) {

        	$namakaryawan = $crud->Readdata('employee','id_karyawan',$notifikasi['id_karyawan']);
        
        	foreach ($namakaryawan as $key ) {
        
             	if($key['id_karyawan'] == $notifikasi['id_karyawan'] ) {

             		$nama = $key['name'];

        	   	}
           	}     
           
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $nama . '</td>';
            echo '<td>' . $notifikasi['judul'] . '</td>';
            echo '<td>' . $notifikasi['deskripsi'] . '</td>';
            echo '<td>' . $notifikasi['date'] . '</td>';
            echo '<td>'.
                    ' <a href="?delete=notifikasi&id='. $notifikasi['push_id'] .'" class="btn btn-danger mx-1"  onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>'.                    
                 '</td>';                 
            echo '</tr>';
        }
        
    ?>
    
</tbody>
</table>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
            
                <div class="modal-body">
                    <p>You are about to delete one track, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="?delete=booking&id='<?php $booking["booking_id"] ?>'" class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>


    