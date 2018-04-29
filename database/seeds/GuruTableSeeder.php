<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->insert([
        		'nama' => 'Kosasih',
        		'mapel' => 'Pemrograman Web',
        		'email' => 'k05451h@gmail.com',
        		'created_at' => Carbon::now()
        	]);
    }
}
