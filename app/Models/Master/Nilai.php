<?php

namespace App\Models\Master;

use App\Models\Model;
use App\Models\Master\DetailKriteria;

class Nilai extends Model
{
    protected $table 		= 'nilai';
    protected $fillable 	= ['id_pemain','id_kriteria','nilai'];

    public function detail()
  	{
  	    return $this->hasMany(DetailKriteria::class, 'id_kriteria');
  	}
}
