<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserCategory;
use File;

class UserCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/usercategory.json");
        $data = json_decode($json, true);

        foreach ($data as $obj) {
            UserCategory::query()->updateOrCreate([
                'id' => $obj['id'],
                'category' => $obj['category'],

            ]);
        }
    }
}
