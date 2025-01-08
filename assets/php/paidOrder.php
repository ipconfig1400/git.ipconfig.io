<?php
include '../../connect.php';
//memulai session
session_start();
//if user is not login, it will locate the user to login page
if ($_SESSION['login_statues'] != true) {
    echo "<script>window.alert('Kamu Belum Login!')</script>";
    echo "<script>window.location='../../login/login.php'</script>";
}

//mendapatkan id user dari session
$user_id = $_SESSION['user_id'];

//mendapatan id produk
$co_id = $_GET['co_id'];
$update = mysqli_query($conn, "UPDATE co_detail SET paid = '1' WHERE co_id = '$co_id'");
echo "<script>window.alert('Berhasil')</script>";
echo "<script>window.location='../../account/user/my_account.php'</script>";
?>