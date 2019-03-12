<?php

namespace App\Models\Master;

use App\Models\Model;
use App\Models\Master\DetailKriteria;

class Kriteria extends Model
{
    protected $table 		= 'kriteria';
    protected $fillable 	= ['nama'];

    public function detail()
  	{
  	    return $this->hasMany(DetailKriteria::class, 'id_kriteria');
  	}
}
