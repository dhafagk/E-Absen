<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
    	'nama',
    	'ttl'
    ];

    public function absen()
    {
    	return $this->hasMany('App\Absen');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
