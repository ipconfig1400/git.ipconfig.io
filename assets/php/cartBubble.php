<?php
function showBubble() {
    include '../../connect.php';
    $user_id = $_SESSION['user_id'];
    $showBubbleCart = mysqli_query($conn, "SELECT cek_keranjang FROM cart_detail WHERE user_id = '$user_id'");
    $total = 0;
    $checkRow = mysqli_num_rows($showBubbleCart);
    if ($checkRow > 0) {
        while ($row = mysqli_fetch_assoc($showBubbleCart)) {
            $total += $row['cek_keranjang'];
        }
        return $total;
    } else {
        return $total;
    }
}
?>