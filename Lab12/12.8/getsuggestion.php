<?php
// Array with product names
$a[] = "Điện Thoại Samsung Galaxy A01 (16GB/2GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử";
$a[] = "Máy Tính Bảng Kindle Fire HD7 Kids Edition - Proof Case (16GB) - Hàng Chính Hãng";
$a[] = "Điện Thoại Samsung Galaxy Note 10 Plus (256GB/12GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử";
$a[] = "Điện Thoại Samsung Galaxy A51 (128GB/6GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử";
$a[] = "Điện Thoại Samsung Galaxy A51 (128GB/6GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử";
$a[] = "Máy Đọc Sách Kindle Paperwhite Gen 10 - 2019 - Hàng Nhập Khẩu";
$a[] = "iPad Pro 11 inch (2018) 64GB Wifi - Hàng Nhập Khẩu Chính Hãng";
$a[] = "Smart Tivi Samsung 32 inch HD UA32N4300AKXXV - Hàng chính hãng";
$a[] = "Tủ Lạnh Inverter Sharp SJ-FX631V-SL (556L)-Hàng Chính Hãng";
$a[] = "Hộp Android tivi box MyTVNet Net 1 - Hàng Chính Hãng";
// get the q parameter from URL
$q = $_REQUEST["q"];
$hint = "";
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>