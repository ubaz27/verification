<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'category' => 'Membership',
                'question' => 'How do I become a member of the BUK Alumni Association?',
                'answer' => 'To become a member, you must be a graduate of Bayero University Kano. You can register online through our membership portal by providing your graduation details, personal information, and paying the required membership fee. New graduates are automatically eligible for membership upon graduation.',
                'sort_order' => 1
            ],
            [
                'category' => 'Membership',
                'question' => 'What are the membership fees and benefits?',
                'answer' => 'Annual membership fee is ₦10,000 for domestic members and $50 for international members. Benefits include access to networking events, job placement assistance, alumni directory, career development workshops, exclusive scholarships for children, and participation in university governance through alumni representation.',
                'sort_order' => 2
            ],
            [
                'category' => 'Membership',
                'question' => 'Can I update my contact information?',
                'answer' => 'Yes, you can update your contact information anytime through your alumni portal account. Simply log in with your credentials and navigate to the profile section to update your address, phone number, email, or professional details. This helps us keep you connected with alumni activities and opportunities.',
                'sort_order' => 3
            ],
            [
                'category' => 'Events',
                'question' => 'What types of events does the association organize?',
                'answer' => 'We organize various events including annual homecoming celebrations, regional chapter meetings, professional development workshops, career fairs, networking dinners, cultural celebrations, mentorship programs, and special lectures by distinguished alumni. Events are held both virtually and in-person across different locations.',
                'sort_order' => 4
            ],
            [
                'category' => 'Events',
                'question' => 'How can I participate in alumni events?',
                'answer' => 'Event information is communicated through our website, email newsletters, social media channels, and WhatsApp groups. You can register for events online or through our regional coordinators. Some events are free for members, while others may require a small participation fee to cover costs.',
                'sort_order' => 5
            ],
            [
                'category' => 'Career',
                'question' => 'Does the association help with job placement?',
                'answer' => 'Yes, we have a dedicated career services program that includes job posting boards, career mentorship matching, CV review services, interview preparation workshops, and networking opportunities with employers. We also maintain partnerships with various organizations that specifically recruit BUK alumni.',
                'sort_order' => 6
            ],
            [
                'category' => 'Career',
                'question' => 'How can I find a mentor or become a mentor?',
                'answer' => 'Our mentorship program connects experienced alumni with recent graduates and young professionals. You can apply to be a mentee or mentor through our online platform. We match participants based on industry, career interests, location, and professional goals. The program includes structured guidance and regular check-ins.',
                'sort_order' => 7
            ],
            [
                'category' => 'University Support',
                'question' => 'How does the association support Bayero University?',
                'answer' => 'We support the university through infrastructure development projects, scholarship funds, research grants, guest lecturing, curriculum advisory services, student mentorship programs, and advocacy for university interests. We have contributed to building projects, laboratory equipment, and library resources.',
                'sort_order' => 8
            ],
            [
                'category' => 'University Support',
                'question' => 'Are there scholarship opportunities for current students?',
                'answer' => 'Yes, we offer various scholarship programs including merit-based scholarships, need-based assistance, and specialized scholarships for specific fields of study. Scholarships are available for undergraduate and postgraduate students. Application processes and criteria are announced annually through the university and our communication channels.',
                'sort_order' => 9
            ],
            [
                'category' => 'Chapters',
                'question' => 'Are there international chapters of the association?',
                'answer' => 'Yes, we have international chapters in the United Kingdom, United States, United Arab Emirates, Canada, South Africa, and several other countries. Each chapter organizes local activities while maintaining connection with the main association. Contact us to join an existing chapter or start a new one in your location.',
                'sort_order' => 10
            ],
            [
                'category' => 'Chapters',
                'question' => 'How can I start a new chapter in my city?',
                'answer' => 'To start a new chapter, you need at least 15 committed BUK alumni in your area. Submit a proposal to the national executive committee including member details, proposed activities, and leadership structure. We provide guidance, constitution templates, and ongoing support for new chapters.',
                'sort_order' => 11
            ],
            [
                'category' => 'Communication',
                'question' => 'How do I stay updated with association news?',
                'answer' => 'Stay connected through our official website, monthly newsletters, Facebook page, LinkedIn group, Twitter account, Instagram, and WhatsApp broadcast lists. Make sure your contact information is current in our database to receive all communications and event notifications.',
                'sort_order' => 12
            ],
            [
                'category' => 'Communication',
                'question' => 'How can I contribute content or share achievements?',
                'answer' => 'We welcome contributions to our newsletter, website, and social media. Share your professional achievements, business milestones, community service, or interesting stories through our publicity secretary. You can also volunteer to write articles or speak at events to inspire fellow alumni.',
                'sort_order' => 13
            ],
            [
                'category' => 'Donations',
                'question' => 'How can I donate to support the association and university?',
                'answer' => 'Donations can be made through bank transfers, online payments, or international wire transfers. We accept donations for general operations, specific projects, scholarship funds, or infrastructure development. All donations are properly acknowledged and used transparently for stated purposes.',
                'sort_order' => 14
            ],
            [
                'category' => 'Donations',
                'question' => 'Are donations tax-deductible?',
                'answer' => 'Donations to the association for educational and charitable purposes may be tax-deductible depending on your country\'s tax laws. We provide proper receipts and documentation for all donations. Consult your tax advisor for specific guidance on deductibility in your jurisdiction.',
                'sort_order' => 15
            ],
            [
                'category' => 'General',
                'question' => 'What is the history of Bayero University Kano?',
                'answer' => 'Bayero University Kano was established in 1975 as a federal university. It was named after the late Emir of Kano, Alhaji Ado Bayero. The university has grown to become one of Nigeria\'s premier institutions with multiple faculties offering undergraduate and postgraduate programs across various disciplines.',
                'sort_order' => 16
            ],
            [
                'category' => 'General',
                'question' => 'How can I get my academic records or transcripts?',
                'answer' => 'Academic records and transcripts should be requested directly from Bayero University Kano\'s Academic Office. The alumni association can provide reference letters and support in facilitating the process, but official academic documents must come from the university\'s registrar\'s office.',
                'sort_order' => 17
            ],
            [
                'category' => 'General',
                'question' => 'How can I volunteer for the association?',
                'answer' => 'We welcome volunteers for various activities including event organization, mentorship programs, fundraising, publicity, and administrative support. Contact your regional coordinator or the national secretariat to express interest. Volunteer opportunities are also announced through our communication channels.',
                'sort_order' => 18
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
