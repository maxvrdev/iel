<?php

namespace Database\Seeders;

use App\Models\Zipcode;
use Illuminate\Database\Seeder;

class ZipcodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zipcode::truncate();

        $csvFile = fopen(base_path("database/data/zipcodes.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Zipcode::create([
                    "zip" => $data['0'],
                    "latitude" => $data['1'],
                    "longitude" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
