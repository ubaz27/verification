<?php

namespace App\Console\Commands;

use App\Models\Executive;
use Illuminate\Console\Command;

class SeedExecutives extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:executives';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the executives table with default data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Seeding executives...');

        $executives = [
            [
                'name' => 'Alh. Shuaibu Idris Mikati',
                'designation' => 'President',
                'avatar' => 'img/president.jpg',
                'bio' => 'A distinguished leader with extensive experience in administration and governance. Alh. Shuaibu has been instrumental in steering the association towards achieving its strategic objectives.',
                'education' => 'Bachelor of Arts, Bayero University Kano',
                'profession' => 'Administrator and Business Executive',
                'achievements' => [
                    'Led major restructuring initiatives',
                    'Established international alumni chapters',
                    'Championed scholarship programs'
                ],
                'status' => true
            ],
            [
                'name' => 'Aare Akinwumi Akinyemi',
                'designation' => 'Vice President I',
                'avatar' => 'img/vp1.jpg',
                'bio' => 'A seasoned professional with expertise in strategic planning and organizational development. Aare Akinwumi brings valuable leadership experience to the association.',
                'education' => 'Bachelor of Science, Bayero University Kano',
                'profession' => 'Strategic Consultant',
                'achievements' => [
                    'Developed alumni engagement strategies',
                    'Coordinated regional chapters',
                    'Mentored young professionals'
                ],
                'status' => true
            ],
            [
                'name' => 'Ahmed Abdulkadir Firdaus',
                'designation' => 'Vice President II',
                'avatar' => 'img/vp2.jpg',
                'bio' => 'An accomplished professional with a strong background in technology and innovation. Ahmed has been pivotal in modernizing the association\'s operations.',
                'education' => 'Bachelor of Engineering, Bayero University Kano',
                'profession' => 'Technology Executive',
                'achievements' => [
                    'Led digital transformation initiatives',
                    'Implemented modern communication systems',
                    'Established tech partnerships'
                ],
                'status' => true
            ],
            [
                'name' => 'Alh. Salisu Indabawa',
                'designation' => 'Secretary General',
                'avatar' => 'img/secgen.jpg',
                'bio' => 'A meticulous administrator with exceptional organizational skills. Alh. Salisu ensures the smooth operation of all association activities.',
                'education' => 'Bachelor of Administration, Bayero University Kano',
                'profession' => 'Public Administrator',
                'achievements' => [
                    'Streamlined administrative processes',
                    'Maintained comprehensive records',
                    'Coordinated executive meetings'
                ],
                'status' => true
            ],
            [
                'name' => 'Ma\'aruf Zakariya',
                'designation' => 'Asst. Sect. Gen I',
                'avatar' => 'img/asstsec2.jpg',
                'bio' => 'A dedicated professional supporting the administrative functions of the association with diligence and commitment.',
                'education' => 'Bachelor of Arts, Bayero University Kano',
                'profession' => 'Administrative Officer',
                'achievements' => [
                    'Assisted in policy implementation',
                    'Coordinated member communications',
                    'Supported event planning'
                ],
                'status' => true
            ]
        ];

        $count = 0;
        foreach ($executives as $executiveData) {
            if (!Executive::where('name', $executiveData['name'])->exists()) {
                Executive::create($executiveData);
                $this->info('Created: ' . $executiveData['name']);
                $count++;
            } else {
                $this->warn('Skipped (already exists): ' . $executiveData['name']);
            }
        }

        $this->info("Successfully seeded {$count} executives!");
        return Command::SUCCESS;
    }
}
