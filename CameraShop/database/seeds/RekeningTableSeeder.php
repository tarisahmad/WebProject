<?php

use Illuminate\Database\Seeder;
use App\Rekening;
class RekeningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['bank_name' => 'BCA','atas_nama'=>'Anindya','no_rekening'=>'123123']
        ];
        Rekening::insert($data);
    }
}
