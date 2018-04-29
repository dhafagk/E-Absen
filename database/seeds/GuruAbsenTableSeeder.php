<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class GuruAbsenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absen_gurus')->insert([
        		'guru_id' => 1,
        		'keterangan' => 'Sakit',
        		'created_at' => Carbon::now()
        	]);
    }
}
