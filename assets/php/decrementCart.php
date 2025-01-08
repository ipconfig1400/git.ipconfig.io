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

    //menampilkan cek_keranjang berdasarkan user id dan id produk
    $cekProduk = mysqli_query($conn, "SELECT cek_keranjang FROM cart_detail WHERE user_id = '$user_id' AND id_keranjang = '$produk'");

    //menampilkan nilai dari cek_keranjang
    $rows = mysqli_fetch_assoc($cekProduk);
    
    //cek apakah produk yang ditargetkan sudah ada dalam keranjang
    if (mysqli_num_rows($cekProduk)) {

        //jika produk sudah ada maka ubah nilai cek_keranjang menjadi -1
        $cekKeranjang = $rows['cek_keranjang'];

        if ($cekKeranjang > 1) {
            $cekKeranjang -= 1;
            //SQL update cek_keranjang berdasarkan user id dan id produk yang telah ada
            $update = mysqli_query($conn, "UPDATE cart_detail SET cek_keranjang = '$cekKeranjang' WHERE user_id = '$user_id' AND id_keranjang = '$produk'");
            
            //alert produk ditambahkan
            echo "<script>window.history.back()</script>";
        } else {
            //jika produk dikurangi hingga 0 
            $delete = mysqli_query($conn, "DELETE FROM cart_detail WHERE user_id = '$user_id' AND id_keranjang = '$produk'");
            echo "<script>window.history.back()</script>";
        }
    } 
    /*else {

        //jika produk belum ada maka data akan dimasukkan
        $query = mysqli_query($conn, "INSERT INTO cart_detail VALUES('','$user_id','','','1','$produk')");
        echo "<script>window.alert('Produk ditambahkan')</script>";
    }*/
