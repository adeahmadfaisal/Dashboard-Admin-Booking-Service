<?php

if(!empty($_GET['view']) && $_GET['view'] == 'bookingvalidasi')
    include 'view/bookingvalidasi.php';

elseif (!empty($_GET['update']) && $_GET['update'] == 'updatevalidasi' )
    include 'view/updatevalidasi.php';

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'booking') {
    include 'view/delete.php';
}

elseif (!empty($_GET['view']) && $_GET['view'] == 'sparepart') {
    include 'view/sparepart.php';
}

elseif (!empty($_GET['update']) && $_GET['update'] == 'updatesparepart') {
    include 'view/updatesparepart.php';
}

elseif (!empty($_GET['add']) && $_GET['add'] == 'insertsparepart') {
    include 'view/insertsparepart.php';
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'sparepart') {
    include 'view/delete.php';
}

elseif (!empty($_GET['view']) && $_GET['view'] == 'mobil') {
    include 'view/mobil.php';
}

elseif (!empty($_GET['add']) && $_GET['add'] == 'mobil') {
    include 'view/insertmobil.php';
}

elseif (!empty($_GET['update']) && $_GET['update'] == 'updatemobil') {
    include 'view/updatemobil.php';
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'mobil') {
    include 'view/delete.php';
}

elseif (!empty($_GET['view']) && $_GET['view'] == 'admin') {
    include 'view/admin.php';
}

elseif (!empty($_GET['add']) && $_GET['add'] == 'admin') {
    include 'view/insertadmin.php';
}

elseif (!empty($_GET['update']) && $_GET['update'] == 'admin') {
    include 'view/updateadmin.php';
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'admin') {
    include 'view/delete.php';
}

elseif (!empty($_GET['view']) && $_GET['view'] == 'notifikasi') {
    include 'view/notifikasi.php';
}

elseif (!empty($_GET['add']) && $_GET['add'] == 'notifikasi') {
    include 'view/insertnotification.php';
}

elseif (!empty($_GET['update']) && $_GET['update'] == 'notifikasi') {
    include 'view/updatenotifikasi.php';
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'notifikasi') {
    include 'view/delete.php';
}

elseif (!empty($_GET['add']) && $_GET['add'] == 'tambahuser') {
    include 'view/tambahuser.php';
}

elseif (!empty($_GET['view']) && $_GET['view'] == 'user') {
    include 'view/user.php';
}

elseif (!empty($_GET['delete']) && $_GET['delete'] == 'user') {
    include 'view/delete.php';
}

elseif (!empty($_GET['update']) && $_GET['update'] == 'user') {
    include 'view/updateuser.php';
}

elseif (empty($_GET))
    include 'view/dashboard.php';

else
    include 'view/404.php';
 ?>