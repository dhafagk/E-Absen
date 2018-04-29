<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsenGuru extends Model
{
    protected $table = 'absen_gurus';
    protected $fillable = [
    	'guru_id',
    	'keterangan'
    ];

    public function guru()
    {
    	return $this->belongsTo('App\Guru');
    }
}
