<?php

namespace Database\Seeders;

use App\Models\Cars;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cars::insert([

            [
                'id' => '100',
                'brand' => 'Toyota',
                'type' => 'Hiace',
                'price' => 35000
            ],

            [
                'id' => '101',
                'brand' => 'Honda',
                'type' => 'Accord',
                'price' => 28000
            ],
            [
                'id' => '102',
                'brand' => 'Suzuki',
                'type' => 'Katana',
                'price' => 15000
            ],

        ]);
    }
}
