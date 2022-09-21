<?php 
$crud 		= new Crud;


if (!empty($_GET['delete']) && $_GET['delete'] == 'booking') {
	$id = $_GET['id'];
  
    $delete		= $crud->Delete('booking_service','booking_id',$id);

    if($delete) {
    	echo '<script>
                           window.location = "?view=bookingvalidasi";    </script> ';
    } else {
    	echo "gagal";
    }

}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'sparepart') {
	$id = $_GET['id'];
  
    $delete		= $crud->Delete('sparepart','id_sparepart',$id);

    if($delete) {
    	echo '<script>
                           window.location = "?view=sparepart";    </script>';
    } else {
    	echo "gagal";
    }

} 

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'mobil') {
    $id = $_GET['id'];
  
    $delete     = $crud->Delete('car','car_id',$id);

    if($delete) {
        echo '<script>
                           window.location = "?view=mobil";    </script>';
    } else {
        echo "gagal";
    }
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'notifikasi') {
    $id = $_GET['id'];
  
    $delete     = $crud->Delete('push_notif','push_id',$id);

    if($delete) {
        echo '<script>
                           window.location = "?view=notifikasi";    </script>';
    } else {
        echo "gagal";
    }
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'user') {
    $id = $_GET['id'];
  
    $delete     = $crud->Delete('employee','id_karyawan',$id);

    if($delete) {
        echo '<script>
                           window.location = "?view=user";    </script>';
    } else {
        echo "gagal";
    }
}

else
 include 'view/404.php';


?>