<?php

//Percabangan

// Nilai di atas 90 : A
// Nilai di atas 80 : B
// Selain Nilai di Atas : C

$nilai = 85;

if ($nilai >= 90) {
    echo "Nilai A";
} elseif ($nilai >= 80) {
    echo "Nilai B";
} else {
    echo "Nilai C";
}
