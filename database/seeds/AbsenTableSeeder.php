<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AbsenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absen')->insert([
        		'siswa_id' => 4,
        		'keterangan' => 'Sakit',
                'created_at' => Carbon::now()
        	]);
    }
}
