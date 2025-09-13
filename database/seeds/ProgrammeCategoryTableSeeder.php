<?php

namespace Database\Seeders;

use App\Models\ProgrammeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class ProgrammeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/programme_category.json");
        $data = json_decode($json, true);

        foreach ($data as $obj) {
            ProgrammeCategory::query()->updateOrCreate([
                'id' => $obj['id'],
                'category' => $obj['category'],

            ]);
        }
    }
}
