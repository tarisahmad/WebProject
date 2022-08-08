<?php

use App\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Camera'],
            ['name' => 'Lighting'],
            ['name' => 'Lensa'],
        ];
        Categories::insert($data);
    }
}