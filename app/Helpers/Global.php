<?php

use App\Data_Karyawan;
use App\Hobi;
use App\Hobi_Karyawan;



function karyawan() {
    $karyawan = Data_Karyawan::all();
    return $karyawan;
}

function hobi() {
    $hobi = Hobi::all();
    return $hobi; 
}

function hobiKaryawan() {
    $karyawan = Data_Karyawan::with(['hobi'])->get();
    // dd($karyawan);
    return $karyawan;
}

function telepon() {
    $karyawan = Data_Karyawan::with(['telepon'])->get();
    return $karyawan;
}
