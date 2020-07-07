<?php

function hitungBiaya($selisih,$jenis_kendaraan) { 
 $selisih -= 1;
 if ($jenis_kendaraan === 'mobil') { 
  $hasil =  ( $selisih * 1000 ) + 5000;
 } else { 
  $hasil = ($selisih * 500 ) + 2000;
 }
return $hasil;

}