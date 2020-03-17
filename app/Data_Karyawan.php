<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_Karyawan extends Model
{
    //
    protected $table = 'data_karyawan';
    protected $fillable = ['name', 'email', 'alamat', 'user_id'];
    public $timestamps = false;
    // protected $guarded = ['id', 'updated_at', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function hobi()
    {
        return $this->belongsToMany('App\Hobi', 'hobi_karyawan', 'karyawan_id', 'hobi_id');
    }

    public function telepon() {
        return $this->hasMany('App\Telepon','data_karyawan_id', 'id');
    }


}
