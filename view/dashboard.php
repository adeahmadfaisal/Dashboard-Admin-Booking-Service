    <!-- Begin Page Content -->
 <?php 
    $crud     = new Crud;
    $read     = $crud->Readvalidasiall();

?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  ><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <div class="row">
            
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-3 mb-6">
                  <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Pending</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-3 mb-6">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Approve</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $approve ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-3 mb-6">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Cancel</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cancel ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-3 mb-6">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Finish</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finish ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

      <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>

    <div class="card-body" style="display:none">
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
    </div>
  </div>
</div>