<?php

//Fungsi Luas Lingkaran
function luasLingkaran($jariJari)
{
    return 3.14 * $jariJari * $jariJari;
}

//Fungsi Luas Persegi
function luasPersegi($panjang, $lebar)
{
    return $panjang * $lebar;
}

//Fungsi Luas Segitiga
function luasSegitiga($alas, $tinggi)
{
    return 0.5 * $alas * $tinggi;
}

echo luasLingkaran(9) . PHP_EOL;
echo luasPersegi(10, 10) . PHP_EOL;
echo luasSegitiga(10, 10) . PHP_EOL;
