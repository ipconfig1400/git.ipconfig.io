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
$produk = $_GET['id_produk'];
$delete = mysqli_query($conn, "DELETE FROM cart_detail WHERE user_id = '$user_id' AND id_keranjang = '$produk'");
echo "<script>window.alert('Berhasil')</script>";
echo "<script>window.history.back()</script>";
?>