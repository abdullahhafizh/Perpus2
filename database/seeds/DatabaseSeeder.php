<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');
    	foreach (range(1,100) as $index) {
    		$judul = 'Apa Itu '.$faker->fileExtension.'?';
    		DB::table('book_lists')->insert([
    			'kode_buku' => $faker->nik(),
    			'judul_buku' => $judul,
    			'pengarang' => $faker->name,
    			'kategori' => $faker->jobTitle,    			
    		]);
    		DB::table('stock_of_books')->insert([    			
    			'judul_buku' => $judul,
    			'nomor_rak' => $faker->buildingNumber,
    			'jumlah_buku' => $faker->numberBetween($min = 0, $max = 9000),    			
    		]);
    	}
    }
}
