<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
use File;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get("database/data/countries.json");
        $data = json_decode($json, true);

        foreach ($data as $obj) {
            Country::query()->updateOrCreate([
                'id' => $obj['id'],
                'nationality' => $obj['country'],
            ]);
        }
    }
}
