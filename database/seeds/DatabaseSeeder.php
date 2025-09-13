<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LgasTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        // $this->call(MissionsTableSeeder::class);
        $this->call(UserCategoryTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(FacultyTableSeeder::class);
        $this->call(ProgrammeCategoryTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);

        $this->call(ProgrammeTableSeeder::class);
        // $this->call(ScholarshipSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(ExecutiveSeeder::class);
    }
}
