<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
        		'nama' => 'Azzario Razy',
        		'alamat' => 'Subang',
        		'ttl' => '11-05-1999',
        		'created_at' => Carbon::now()
        	]);
    }
}
