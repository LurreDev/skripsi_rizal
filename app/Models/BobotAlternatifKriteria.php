<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotAlternatifKriteria extends Model
{
    protected $table='bobot_alternatif_kriteria';
            protected $fillable = [
    'kriteria_id','alternatif_id', 'nilai',
    ];

    public function alternatif()
    {
		// return $this->belongsTo('App\Models\PilihanAlternatif' ,'alternatif_id','id');
        return $this->belongsTo(Alternatif::class);
    }
    public function kriteria()
    {
        // return $this->belongsTo('App\Models\Kriteria' ,'kriteria_id','id');
        return $this->belongsTo(Kriteria::class);
    }
}
