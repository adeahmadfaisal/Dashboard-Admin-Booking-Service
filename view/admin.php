<?php 
    
    $id         =  $_SESSION['id'] ;
    $crud       = new Crud;
    $read       = $crud->Readdata('employee','id_karyawan',$id);
  
        if(isset($_POST["submit"])) 
            {
                $arrdata    = array(

                                    "name='".$_POST['name']."'" ,
                                    "email='".$_POST['email']."'" ,
                                    "password=md5('".$_POST['password']."')"
                                    
                                   );

              

                $update     = $crud->Update('employee',$arrdata,'id_karyawan',$id);

                
                
                if(!$update)    {
                       echo "Gagal";
                   } else {
                  echo '  <script>
                           window.location = "?view=admin";    </script> ';
                   }
         }



    
    foreach ($read as $admin ) {
            
?>
<div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profile Admin</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" > 
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name" class="form-control" placeholder="Input your event title" value="<?php echo $admin['name'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"  value="<?php echo $admin['email'];?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  value="<?php echo $admin['password'];?>">
                    </div>
                    
        



<?php } ?>

        <div class="btn-group float-right mt-2" role="group">
            <button type="submit" name="submit" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus" aria-hidden="true"></i> Update </button>
            <a class="btn btn-danger btn-md" href="?view=admin">
                <i class="fa fa-times" aria-hidden="true"></i>Back</a>
        </div>
    </form>

    