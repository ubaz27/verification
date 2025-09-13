<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use File;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $json = File::get("database/data/units.json");
        // $data = json_decode($json, true);

        // foreach ($data as $obj) {
        //     Unit::query()->updateOrCreate([
        //         'id' => $obj['id'],
        //         'unit_name' => $obj['unit'],

        //     ]);
        // }
    }
}
