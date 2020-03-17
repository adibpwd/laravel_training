<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi_Karyawan extends Model
{
    protected $table = 'hobi_karyawan';
    protected $fillable = ['karyawan_id', 'hobi_id'];
    public $timestamps = false;

    // public function hobiAndKaryawan()
    // {
    //     return $this->('App\Hobi_Karyawan');
    // }
}
