<?php

namespace Database\Seeders;

use App\Models\Organisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organisation::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Bayero University, Kano',
                'short_name' => 'Bayero Uni.,',
                'abbreviation' => 'BUK',
                'state_id' => 1,
            ]
        );
    }
}
