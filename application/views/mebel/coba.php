<?php 
$id = 'PR0001';
$panjang = 1;
$lebar = -1;
$tinggi = 1;
$harga = 100000;
$produk = $this->db->query("SELECT * FROM produk WHERE id_produk='PR0002'")->result();
foreach($produk as $g) {
    $panjang1 = $g->panjang;
    $lebar2 = $g->lebar;
    $tinggi3 = $g->tinggi;
}
if($panjang == 0 && $lebar > 0 && $tinggi > 0) {
    $pjg = $panjang1;
    $lbr = $lebar2+$lebar;
    $tng = $tinggi3+$tinggi;
    
    $tambahan2 = $lebar*20000;
    $tambahan3 = $tinggi*20000;
    $hargafix = $harga+$tambahan2+$tambahan3;
}else if($lebar == 0 && $panjang > 0 && $tinggi > 0) {
    $pjg = $panjang1+$panjang;
    $lbr = $lebar2;
    $tng = $tinggi3+$tinggi3;
    
    $tambahan1 = $panjang*20000;
    $tambahan3 = $tinggi*20000;
    $hargafix = $harga+$tambahan1+$tambahan3;
}else if($tinggi == 0 && $lebar > 0 && $panjang > 0) {
    $pjg = $panjang1+$panjang;
    $lbr = $lebar2+$lebar;
    $tng = $tinggi3;
    $tambahan1 = $panjang*20000;
    $tambahan2 = $lebar*20000;
    $hargafix = $harga+$tambahan1+$tambahan2;
}else if($panjang == 0 && $lebar == 0 && $tinggi == 0){
    $pjg = $panjang1;
    $lbr = $lebar2;
    $tng = $tinggi3;
    $hargafix = $harga;
}else if($panjang == 0 && $lebar == 0 && $tinggi > 0){
    $pjg = $panjang1;
    $lbr = $lebar2;
    $tng = $tinggi3+$tinggi;
    
    $tambahan3 = $tinggi*20000;
    $hargafix = $harga+$tambahan3;
}else if($panjang == 0 && $lebar > 0 && $tinggi == 0){
    $pjg = $panjang1;
    $lbr = $lebar2+$lebar;
    $tng = $tinggi3;
    $tambahan2 = $lebar*20000;
    $tng = $tinggi3;
    $hargafix = $harga+$tambahan2;
}else if($panjang > 0 && $lebar == 0 && $tinggi == 0){
    $pjg = $panjang1+$panjang;
    $lbr = $lebar2;
    $tng = $tinggi3;
    
    $tambahan1 = $panjang*20000;
    $hargafix = $harga+$tambahan1;
}else{
    $pjg = $panjang1+$panjang;
    $lbr = $lebar2+$lebar;
    $tng = $tinggi3+$tinggi;
    $tambahan1 = $panjang*20000;
    $tambahan2 = $lebar*20000;
    $tambahan3 = $tinggi*20000;
    $hargafix = $harga+$tambahan1+$tambahan2+$tambahan3;
}

echo $pjg-$panjang1; print "<br>";
echo $lbr-$lebar2; print "<br>";
echo $tng-$tinggi3; print "<br>";
echo $hargafix;


?>