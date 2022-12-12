<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanAlternatif extends Model
{
    //
    protected $fillable = [
        'id_alternatif',
        'kode_alternatif',
        'nama_alternatif',
        'id_user',
    ];

    // public function alternatif()
    // {
		// return $this->belongsTo('App\Model\Alternatif' ,'id_alternatif','id');
    // }
}
