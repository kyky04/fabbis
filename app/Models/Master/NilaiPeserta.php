<?php

namespace App\Models\Master;

use App\Models\Model;
use App\Models\Master\DetailKriteria;

class NilaiPeserta extends Model
{
    protected $table 		= 'nilai_peserta';
    protected $fillable 	= ['id_pemain',
                            'id_kriteria',
                            'dribble1',
                            'dribble2',
                            'dribble3',
                            'dribble4',
                            'dribble5',
                            'dribble6',
                            'dribble7',
                            'dribble8',
                            'shooting1',
                            'shooting2',
                            'shooting3',
                            'shooting4',
                            'pass1',
                            'pass2',
                            'pass3',
                            'pass4',
                            'defence',
                            'serangan',
                            'speed'];

    public function pemain()
  	{
  	    return $this->belongsTo(Pemain::class, 'id_pemain');
  	}
}
