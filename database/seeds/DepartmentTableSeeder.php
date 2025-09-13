<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get("database/data/departments.json");
        $data = json_decode($json, true);

        foreach ($data as $obj) {
            Department::query()->updateOrCreate([
                'id' => $obj['id'],
                'department' => $obj['department'],
                'faculty_id' => $obj['faculty_id'],

            ]);
        }
    }
}
