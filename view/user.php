<?php 
    $crud     = new Crud;
    $read     = $crud->Readdata('employee',null,null);
    

?>

<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">User</h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Semua User</h6>
</div>
<div class="card-body">
    <div class="py-3">
  <a href="?add=tambahuser" class="btn btn-info" role="button">Tambah Data</a>  
</div>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
    <th>No</th>
    <th>Nama Karyawan</th>
    <th>Email</th>
    <th>Level</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>


    <?php 

        $no = 1;
        foreach ($read as $car ) {
           
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $car['name'] . '</td>';
            echo '<td>' . $car['email'] . '</td>';
            echo '<td>' . $car['level'] . '</td>';

           
            echo '<td>'.

                        
                    '<a href="?update=user&id='. $car['id_karyawan'] .'" class="btn btn-warning mx-1"><i class="fa fa-edit" aria-hidden="true"></i></a>'.
                    ' <a href="?delete=user&id='. $car['id_karyawan'] .'" class="btn btn-danger mx-1"  onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>'.                    
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


    