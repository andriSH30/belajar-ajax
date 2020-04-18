<?php

use Illuminate\Database\Seeder;
use App\mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\mahasiswa::class, 40)->create();
    }
}
