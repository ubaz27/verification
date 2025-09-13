<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class ProgrammeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/programmes.json");
        $data = json_decode($json, true);

        foreach ($data as $obj) {
            Programme::query()->updateOrCreate([
                'id' => $obj['id'],
                'programme' => $obj['programme'],
                'department_id' => $obj['department_id'],

            ]);
        }
    }
}
