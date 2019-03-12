<?php

namespace App\Models\Master;

use App\Models\Model;
use App\Models\Model\Kriteria;

class DetailKriteria extends Model
{
    protected $table 		= 'kriteria_detail';
    protected $fillable 	= ['id_kriteria','nama'];

    public function kriteria()
  	{
  	    return $this->belongsTo(Kriteria::class, 'id_kriteria');
  	}
}
