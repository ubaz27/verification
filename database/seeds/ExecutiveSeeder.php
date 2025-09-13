<?php

namespace Database\Seeders;

use App\Models\Executive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExecutiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            ],
            [
                'name' => 'Mairo D Suleiman',
                'designation' => 'Asst. Sect. Gen II',
                'avatar' => 'img/asstsec1.jpg',
                'bio' => 'A committed professional with excellent organizational and communication skills, supporting the association\'s administrative excellence.',
                'education' => 'Bachelor of Science, Bayero University Kano',
                'profession' => 'Project Coordinator',
                'achievements' => [
                    'Managed member databases',
                    'Coordinated regional activities',
                    'Facilitated stakeholder meetings'
                ],
                'status' => true
            ],
            [
                'name' => 'Safiya Stephanie Musa',
                'designation' => 'Financial Secretary',
                'avatar' => 'img/finsec.jpg',
                'bio' => 'A financial expert with extensive experience in financial management and reporting, ensuring transparency in all financial matters.',
                'education' => 'Bachelor of Accounting, Bayero University Kano',
                'profession' => 'Financial Analyst',
                'achievements' => [
                    'Maintained financial transparency',
                    'Implemented financial controls',
                    'Prepared comprehensive reports'
                ],
                'status' => true
            ],
            [
                'name' => 'Amb. Adamu Babangida',
                'designation' => 'Internal Auditor',
                'avatar' => 'img/auditor.jpg',
                'bio' => 'A distinguished ambassador and auditor with extensive experience in governance and accountability frameworks.',
                'education' => 'Bachelor of Economics, Bayero University Kano',
                'profession' => 'Ambassador and Auditor',
                'achievements' => [
                    'Established audit frameworks',
                    'Ensured compliance standards',
                    'Promoted good governance'
                ],
                'status' => true
            ],
            [
                'name' => 'Lawal Ali Gujungu',
                'designation' => 'Treasurer',
                'avatar' => 'img/treasurer.jpg',
                'bio' => 'A financial professional with proven expertise in treasury management and financial planning for non-profit organizations.',
                'education' => 'Bachelor of Finance, Bayero University Kano',
                'profession' => 'Financial Manager',
                'achievements' => [
                    'Managed association treasury',
                    'Developed investment strategies',
                    'Coordinated fundraising activities'
                ],
                'status' => true
            ],
            [
                'name' => 'Mustapha A. Dawaki',
                'designation' => 'Social Welfare',
                'avatar' => 'img/social.jpg',
                'bio' => 'A compassionate leader dedicated to alumni welfare and community service initiatives within the association.',
                'education' => 'Bachelor of Social Work, Bayero University Kano',
                'profession' => 'Social Worker',
                'achievements' => [
                    'Established welfare programs',
                    'Coordinated support services',
                    'Promoted community engagement'
                ],
                'status' => true
            ],
            [
                'name' => 'Barr. Saidu Tudunwada',
                'designation' => 'Legal Adviser',
                'avatar' => 'img/legal.jpg',
                'bio' => 'A distinguished legal practitioner providing expert legal guidance and ensuring compliance with regulatory requirements.',
                'education' => 'Bachelor of Law, Bayero University Kano',
                'profession' => 'Barrister and Solicitor',
                'achievements' => [
                    'Provided legal frameworks',
                    'Ensured regulatory compliance',
                    'Drafted constitutional amendments'
                ],
                'status' => true
            ],
            [
                'name' => 'Mukhtar Zubairu Surajo',
                'designation' => 'Publicity Secretary',
                'avatar' => 'img/alumni2.jpeg',
                'bio' => 'A communications expert responsible for managing the association\'s public relations and media engagement strategies.',
                'education' => 'Bachelor of Mass Communication, Bayero University Kano',
                'profession' => 'Media and Communications Specialist',
                'achievements' => [
                    'Developed communication strategies',
                    'Managed media relations',
                    'Enhanced public visibility'
                ],
                'status' => true
            ],
            [
                'name' => 'Dr. Bala Muhammad',
                'designation' => 'ExOfficio North West',
                'avatar' => 'img/ex-nw.jpg',
                'bio' => 'A respected academic and leader representing the North West region in the association\'s executive council.',
                'education' => 'PhD, Bayero University Kano',
                'profession' => 'Academic and Researcher',
                'achievements' => [
                    'Coordinated regional activities',
                    'Promoted academic excellence',
                    'Facilitated research partnerships'
                ],
                'status' => true
            ],
            [
                'name' => 'Alh. Ibrahim Idris Danisan-Fika',
                'designation' => 'ExOfficio North East',
                'avatar' => 'img/ex-ne.jpg',
                'bio' => 'An experienced leader representing the North East region with focus on regional development and alumni engagement.',
                'education' => 'Bachelor of Arts, Bayero University Kano',
                'profession' => 'Regional Coordinator',
                'achievements' => [
                    'Strengthened regional networks',
                    'Promoted inter-regional cooperation',
                    'Facilitated development projects'
                ],
                'status' => true
            ],
            [
                'name' => 'Aliyu Emu Yusuf',
                'designation' => 'ExOfficio North Central',
                'avatar' => 'img/ex-nc.jpg',
                'bio' => 'A dedicated professional representing the North Central region in promoting alumni engagement and development.',
                'education' => 'Bachelor of Science, Bayero University Kano',
                'profession' => 'Development Specialist',
                'achievements' => [
                    'Coordinated regional programs',
                    'Promoted alumni participation',
                    'Facilitated capacity building'
                ],
                'status' => true
            ],
            [
                'name' => 'Joseph Adewale Rannaiye',
                'designation' => 'ExOfficio South West',
                'avatar' => 'img/ex-sw.jpg',
                'bio' => 'A dynamic leader representing the South West region with expertise in business development and alumni networking.',
                'education' => 'Bachelor of Business Administration, Bayero University Kano',
                'profession' => 'Business Development Manager',
                'achievements' => [
                    'Expanded southern networks',
                    'Facilitated business partnerships',
                    'Promoted entrepreneurship'
                ],
                'status' => true
            ],
            [
                'name' => 'Olorogun Oyibo Adejero Mohd',
                'designation' => 'ExOfficio South South',
                'avatar' => 'img/alumni2.jpeg',
                'bio' => 'A distinguished leader representing the South South region with focus on oil and gas industry engagement.',
                'education' => 'Bachelor of Engineering, Bayero University Kano',
                'profession' => 'Oil and Gas Executive',
                'achievements' => [
                    'Developed industry partnerships',
                    'Promoted technical education',
                    'Facilitated career opportunities'
                ],
                'status' => true
            ],
            [
                'name' => 'Lawrence Juwah',
                'designation' => 'ExOfficio South East',
                'avatar' => 'img/ex-ss.jpg',
                'bio' => 'An accomplished professional representing the South East region with expertise in commerce and trade development.',
                'education' => 'Bachelor of Commerce, Bayero University Kano',
                'profession' => 'Trade Development Specialist',
                'achievements' => [
                    'Promoted trade relations',
                    'Facilitated business networks',
                    'Supported economic development'
                ],
                'status' => true
            ]
        ];

        foreach ($executives as $executive) {
            Executive::create($executive);
        }
    }
}
