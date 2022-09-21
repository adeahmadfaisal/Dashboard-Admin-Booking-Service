<?php 
    $crud     = new Crud;
    $read     = $crud->Readvalidasiall();

?>

<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Booking Service</h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">All Booking Service</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Tipe Mobil</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Tipe Service</th>
    <th>Keluhan</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>


    <?php 

        $no = 1;
        foreach ($read as $booking ) {
            $getidcar   = $crud->getcar($booking['car_id']);


            foreach ($getidcar as $id) {

                if ($booking['car_id'] == $id['car_id'])
                
                {
                    $namecar = $id['type_car'];
                }

            }

            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $booking['name'] . '</td>';
            echo '<td>' . $namecar . '</td>';
            echo '<td>' . $booking['date'] . '</td>';
            echo '<td>' . $booking['hour'] . '</td>';
            echo '<td>' . $booking['type_service'] . '</td>';
            echo '<td>' . $booking['problem'] . '</td>';
            echo '<td>' . $booking['status'] . '</td>';
           
            echo '<td>'.

                        
                    '<a href="?update=updatevalidasi&id='. $booking['booking_id'] .'" class="btn btn-warning mx-1"><i class="fa fa-edit" aria-hidden="true"></i></a>'.
                    ' <a href="?delete=booking&id='. $booking['booking_id'] .'" class="btn btn-danger mx-1"  onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>'.                    
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


    