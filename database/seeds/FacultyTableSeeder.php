<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Faculty;
use File;


class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get("database/data/faculties.json");
        $data = json_decode($json, true);

        foreach ($data as $obj) {
            Faculty::query()->updateOrCreate([
                'id' => $obj['id'],
                'faculty' => $obj['faculty'],

            ]);
        }
    }
}
