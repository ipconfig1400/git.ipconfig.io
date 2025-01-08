<?php 
function currency($value) {
    $value =  "Rp " . number_format($value, 0, ",", ".");
    return $value;
}
?>