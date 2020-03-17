<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $fillable = ['data_karyawan_id', 'telepon'];

    public function karyawan() {
        return $this->belongsTo('Appp\Data_Karyawan', 'data_karyawan_id', 'id');
    }
}