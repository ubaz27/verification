<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\University;
use File;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $json = File::get("database/data/univeristy.json");
        // $data = json_decode($json, true);

        // foreach ($data as $obj) {
        //     University::query()->updateOrCreate([
        //         'id' => $obj['id'],
        //         'university' => $obj['university'],

        //     ]);
        // }
    }
}
