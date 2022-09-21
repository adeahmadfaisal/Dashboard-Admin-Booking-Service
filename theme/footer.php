
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © App Notulen 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
    <script>
    function checkDelete(){
    return confirm('Are you sure delete data?');
}
    </script>
    <script>
    function checknotifikasi(){
    return confirm('Apakah data sudah benar?');
}
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="theme/vendor/jquery/jquery.min.js"></script>
    <script src="theme/vendor/chart.js/Chart.js"></script>
    <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="theme/js/sb-admin-2.min.js"></script>
    <script src="theme/js/custom.js"></script>

    <!-- Page level plugins -->
    <script src="theme/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="theme/js/demo/datatables-demo.js"></script>
    <script>
      $('#error').hide();
      $('input[name=repassword]').keyup(function() {
    var pass = $('input[name=password]').val();
    var repass = $('input[name=repassword]').val();
     if (pass != repass) {

        $('#error').show(200);
        $('input[name=repassword]').addClass('bg-danger text-white');
        $('#submit').prop('disabled', true);
    }
    else {

        $('#error').hide(200);
        $('input[name=repassword]').removeClass('bg-danger text-white');
        $('#submit').prop('disabled', false);   
    }
});
    </script>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Pending", "Approve", "Cancel", "Finish"],
        datasets: [{
          label: '',
          data: [
          <?php 
          echo $pending;
          ?>, 
          <?php 
          echo $approve;
          ?>, 
          <?php 
          echo $cancel;
          ?>, 
          <?php 
          echo $finish;
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>



</body>