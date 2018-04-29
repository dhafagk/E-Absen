<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = [
    	'nama',
    	'mapel',
    	'email'
    ];

    public function absenguru()
    {
    	return $this->hasMany('App\AbsenGuru');
    }
}
