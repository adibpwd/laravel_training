<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'hobi';
    protected $fillable = ['name_hobi'];

    public function karyawan()
    {
        return $this->belongsToMany('App\Data_Karyawan', 'hobi_karyawan', 'hobi_id', 'karyawan_id');
    }
}