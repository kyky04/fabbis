<?php

namespace App\Models\Profil;

use App\Models\Model;

class Sejarah extends Model
{
    protected $table 		= 'ref_sejarah';
    protected $log_table 	= 'log_sejarah';
    protected $log_table_fk	= 'id_sejarah';
    protected $fillable 	= ['judul', 'konten', 'keterangan'];
}
