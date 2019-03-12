<?php

namespace App\Models\Master;

use App\Models\Model;
use App\Models\Master\DetailKriteria;

class Pemain extends Model
{
    protected $table 		= 'pemain';
    protected $fillable 	= ['nama','nim','tingg','berat','posisi','foto','status','gender','terpilih'];

    public function nilai()
  	{
  	    return $this->hasOne(NilaiPeserta::class, 'id_pemain');
  	}
}
