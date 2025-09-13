<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;
use Carbon\Carbon;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scholarships = [
            // Merit-Based Scholarships
            [
                'scholarship_type' => 'Merit-Based',
                'title' => 'BUK Alumni Excellence Award',
                'organisation' => 'BUK Alumni Association',
                'date_posted' => Carbon::now()->subDays(30),
                'deadline' => Carbon::now()->addMonths(6),
                'amount' => 1000000,
                'eligibility' => 'CGPA 4.5+, Leadership experience, Community service involvement',
                'description' => 'Awarded to outstanding students demonstrating academic excellence and leadership potential.',
                'duration' => '4 years (Undergraduate)',
                'application_link' => 'https://bukalumni.org/scholarships/excellence-award',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Merit-Based',
                'title' => 'Vice-Chancellor\'s Scholarship',
                'organisation' => 'Bayero University Kano',
                'date_posted' => Carbon::now()->subDays(25),
                'deadline' => Carbon::now()->addMonths(7),
                'amount' => 750000,
                'eligibility' => 'Top 5% of class, Research potential, Academic publications',
                'description' => 'Supporting exceptional students with strong research interests and academic performance.',
                'duration' => 'Full program duration',
                'application_link' => 'https://buk.edu.ng/scholarships/vc-award',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Merit-Based',
                'title' => 'STEM Innovation Scholarship',
                'organisation' => 'Nigerian Academy of Science',
                'date_posted' => Carbon::now()->subDays(20),
                'deadline' => Carbon::now()->addMonths(8),
                'amount' => 1500000,
                'eligibility' => 'STEM fields, Innovation projects, Patent applications',
                'description' => 'Encouraging innovation and excellence in Science, Technology, Engineering, and Mathematics.',
                'duration' => '2-4 years',
                'application_link' => 'https://nas.org.ng/stem-scholarship',
                'posted_by' => null,
            ],

            // Gender-Specific Scholarships
            [
                'scholarship_type' => 'Gender-Specific',
                'title' => 'Girls Education Initiative',
                'organisation' => 'UN Women Nigeria',
                'date_posted' => Carbon::now()->subDays(15),
                'deadline' => Carbon::now()->addMonths(5),
                'amount' => 800000,
                'eligibility' => 'Female students, Financial need, Academic merit',
                'description' => 'Empowering young women through quality education and leadership development.',
                'duration' => 'Full program',
                'application_link' => 'https://unwomen.org.ng/education-initiative',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Gender-Specific',
                'title' => 'Women in Technology Scholarship',
                'organisation' => 'Google Nigeria',
                'date_posted' => Carbon::now()->subDays(10),
                'deadline' => Carbon::now()->addMonths(4),
                'amount' => 1200000,
                'eligibility' => 'Female STEM students, Programming skills, Tech projects',
                'description' => 'Supporting women pursuing careers in technology and engineering fields.',
                'duration' => '2-4 years',
                'application_link' => 'https://google.com/scholarships/women-tech',
                'posted_by' => null,
            ],

            // Government Scholarships
            [
                'scholarship_type' => 'Government',
                'title' => 'Presidential Scholarship Scheme',
                'organisation' => 'Federal Government of Nigeria',
                'date_posted' => Carbon::now()->subDays(45),
                'deadline' => Carbon::now()->addMonths(9),
                'amount' => 2500000,
                'eligibility' => 'Nigerian citizens, Academic excellence, Leadership potential',
                'description' => 'Nigeria\'s premier scholarship program for exceptional students in critical fields.',
                'duration' => 'Full program duration',
                'application_link' => 'https://scholarships.gov.ng/presidential',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Government',
                'title' => 'Kano State Education Trust Fund',
                'organisation' => 'Kano State Government',
                'date_posted' => Carbon::now()->subDays(40),
                'deadline' => Carbon::now()->addMonths(6),
                'amount' => 600000,
                'eligibility' => 'Kano State indigenes, Financial need, Good academic standing',
                'description' => 'Supporting indigenous students from Kano State in pursuing higher education.',
                'duration' => 'Undergraduate programs',
                'application_link' => 'https://kanostate.gov.ng/education/scholarships',
                'posted_by' => null,
            ],

            // Corporate Scholarships
            [
                'scholarship_type' => 'Corporate',
                'title' => 'MTN Foundation Scholarship',
                'organisation' => 'MTN Foundation',
                'date_posted' => Carbon::now()->subDays(35),
                'deadline' => Carbon::now()->addMonths(3),
                'amount' => 300000,
                'eligibility' => 'Undergraduate students, Good grades, Community involvement',
                'description' => 'MTN\'s commitment to educational development and youth empowerment in Nigeria.',
                'duration' => '4 years',
                'application_link' => 'https://mtnfoundation.org/scholarships',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Corporate',
                'title' => 'Dangote Foundation Scholarship',
                'organisation' => 'Dangote Foundation',
                'date_posted' => Carbon::now()->subDays(30),
                'deadline' => Carbon::now()->addMonths(4),
                'amount' => 500000,
                'eligibility' => 'Engineering, Business, Science students, Academic excellence',
                'description' => 'Supporting students in key development sectors across Nigerian universities.',
                'duration' => 'Full program',
                'application_link' => 'https://dangote.com/foundation/scholarships',
                'posted_by' => null,
            ],

            // Medical/Health Scholarships
            [
                'scholarship_type' => 'Medical/Health',
                'title' => 'Nigerian Medical Association Scholarship',
                'organisation' => 'Nigerian Medical Association',
                'date_posted' => Carbon::now()->subDays(25),
                'deadline' => Carbon::now()->addMonths(5),
                'amount' => 1500000,
                'eligibility' => 'Medical students, Excellence in studies, Research interest',
                'description' => 'Supporting the next generation of medical professionals in Nigeria.',
                'duration' => '6 years (Medical school)',
                'application_link' => 'https://nma.org.ng/scholarships',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Medical/Health',
                'title' => 'WHO Nigeria Health Scholarship',
                'organisation' => 'World Health Organization',
                'date_posted' => Carbon::now()->subDays(20),
                'deadline' => Carbon::now()->addMonths(6),
                'amount' => 2000000,
                'eligibility' => 'Public health focus, Work experience, Leadership potential',
                'description' => 'WHO\'s investment in strengthening Nigeria\'s health system through education.',
                'duration' => '2 years (Masters)',
                'application_link' => 'https://who.int/nigeria/scholarships',
                'posted_by' => null,
            ],

            // International Scholarships
            [
                'scholarship_type' => 'International',
                'title' => 'Chevening Scholarships (UK)',
                'organisation' => 'UK Government',
                'date_posted' => Carbon::now()->subDays(60),
                'deadline' => Carbon::now()->addMonths(2),
                'amount' => 8000000,
                'eligibility' => 'Leadership potential, UK university admission, Work experience',
                'description' => 'UK government\'s global scholarship programme for future leaders.',
                'duration' => '1 year (Masters)',
                'application_link' => 'https://chevening.org/scholarships',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'International',
                'title' => 'Commonwealth Scholarships',
                'organisation' => 'Commonwealth Scholarship Commission',
                'date_posted' => Carbon::now()->subDays(55),
                'deadline' => Carbon::now()->addMonths(3),
                'amount' => 6000000,
                'eligibility' => 'Commonwealth countries, Development focus, Academic excellence',
                'description' => 'Supporting students from developing Commonwealth countries.',
                'duration' => '1-3 years',
                'application_link' => 'https://cscuk.fcdo.gov.uk',
                'posted_by' => null,
            ],

            // Some expired scholarships for testing
            [
                'scholarship_type' => 'Corporate',
                'title' => 'Shell Nigeria University Scholarship',
                'organisation' => 'Shell Nigeria',
                'date_posted' => Carbon::now()->subMonths(6),
                'deadline' => Carbon::now()->subDays(30), // Expired
                'amount' => 400000,
                'eligibility' => 'Nigerian students, Community impact, Environmental studies',
                'description' => 'Shell\'s investment in Nigerian education and community development.',
                'duration' => 'Undergraduate study',
                'application_link' => 'https://shell.com.ng/scholarships',
                'posted_by' => null,
            ],
            // Additional Merit-Based Scholarships
            [
                'scholarship_type' => 'Merit-Based',
                'title' => 'Academic Distinction Scholarship',
                'organisation' => 'BUK Academic Board',
                'date_posted' => Carbon::now()->subDays(18),
                'deadline' => Carbon::now()->addMonths(5),
                'amount' => 900000,
                'eligibility' => 'Top 10% of department, Academic awards, Extracurricular activities',
                'description' => 'Recognizing students with outstanding academic records and active campus involvement.',
                'duration' => 'Full program duration',
                'application_link' => 'https://buk.edu.ng/scholarships/distinction',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Merit-Based',
                'title' => 'Innovation Leaders Scholarship',
                'organisation' => 'Nigerian Innovation Council',
                'date_posted' => Carbon::now()->subDays(12),
                'deadline' => Carbon::now()->addMonths(4),
                'amount' => 1100000,
                'eligibility' => 'Innovation projects, Leadership roles, Academic merit',
                'description' => 'Awarded to students who demonstrate leadership and innovation in their field.',
                'duration' => '2 years',
                'application_link' => 'https://innovationcouncil.org.ng/scholarships/leaders',
                'posted_by' => null,
            ],

            // Additional Government Scholarships
            [
                'scholarship_type' => 'Government',
                'title' => 'National Youth Empowerment Scholarship',
                'organisation' => 'Federal Ministry of Education',
                'date_posted' => Carbon::now()->subDays(32),
                'deadline' => Carbon::now()->addMonths(7),
                'amount' => 1000000,
                'eligibility' => 'Nigerian citizens, Youth empowerment, Academic achievement',
                'description' => 'Empowering Nigerian youth through financial support for higher education.',
                'duration' => 'Full program duration',
                'application_link' => 'https://education.gov.ng/scholarships/youth-empowerment',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Government',
                'title' => 'State Merit Scholarship',
                'organisation' => 'Kaduna State Government',
                'date_posted' => Carbon::now()->subDays(28),
                'deadline' => Carbon::now()->addMonths(6),
                'amount' => 700000,
                'eligibility' => 'Kaduna State indigenes, Academic excellence, Community service',
                'description' => 'Supporting meritorious students from Kaduna State.',
                'duration' => 'Undergraduate programs',
                'application_link' => 'https://kadunastate.gov.ng/scholarships/merit',
                'posted_by' => null,
            ],

            // Additional Medical/Health Scholarships
            [
                'scholarship_type' => 'Medical/Health',
                'title' => 'Nursing Excellence Scholarship',
                'organisation' => 'Nigerian Nurses Association',
                'date_posted' => Carbon::now()->subDays(22),
                'deadline' => Carbon::now()->addMonths(5),
                'amount' => 1000000,
                'eligibility' => 'Nursing students, Academic merit, Clinical experience',
                'description' => 'Awarded to outstanding nursing students committed to healthcare excellence.',
                'duration' => '3 years (Nursing program)',
                'application_link' => 'https://nna.org.ng/scholarships/excellence',
                'posted_by' => null,
            ],
            [
                'scholarship_type' => 'Medical/Health',
                'title' => 'Public Health Leaders Scholarship',
                'organisation' => 'Nigeria Centre for Disease Control',
                'date_posted' => Carbon::now()->subDays(16),
                'deadline' => Carbon::now()->addMonths(4),
                'amount' => 1300000,
                'eligibility' => 'Public health students, Leadership, Research experience',
                'description' => 'Supporting future leaders in public health and disease control.',
                'duration' => '2 years (Masters)',
                'application_link' => 'https://ncdc.gov.ng/scholarships/leaders',
                'posted_by' => null,
            ],
        ];

        foreach ($scholarships as $scholarship) {
            Scholarship::create($scholarship);
        }
    }
}
