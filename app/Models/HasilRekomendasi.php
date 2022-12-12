<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilRekomendasi extends Model
{
    //
    protected $fillable = [
        'user_id',
        'alternatif_id',
        'jumlah_kalori',
        'keterangan',
        'status',
    ];

    public function alternatif()
    {
		return $this->belongsTo('App\Models\Alternatif' ,'alternatif_id','id');
    }
     
}
