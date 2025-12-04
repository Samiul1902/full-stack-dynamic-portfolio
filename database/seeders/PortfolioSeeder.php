<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;
use App\Models\StudyHistory;
use App\Models\Achievement;
use App\Models\Resume;

class PortfolioSeeder extends Seeder
{
    /**
     * Seed portfolio data: projects, skills, study history, achievements, resume.
     */
    public function run(): void
    {
        // -------- Projects (updateOrCreate: safe to run many times) --------
        Project::updateOrCreate(
            ['slug' => 'smart-salon-reservation-system'],
            [
                'title'          => 'Smart Salon Reservation System',
                'category'       => 'web',
                'short_description' => 'Full-stack Laravel reservation & management system.',
                'long_description'  => 'Built with Laravel and MySQL, includes customer booking, admin dashboard and reports.',
                'github_url'     => 'https://github.com/rafi1467/Smart-Salon-Beauty-Parlour-Reservation-Management-System',
                'live_url'       => null,
                'tech_stack'     => ['Laravel', 'MySQL', 'PHP', 'JavaScript'],
                'is_featured'    => true,
                'display_order'  => 1,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'kidney-cancer-detection'],
            [
                'title'          => 'Kidney Cancer Detection',
                'category'       => 'Deep Learning',
                'short_description' => 'Deep learning pipeline for kidney cancer detection from medical images.',
                'long_description'  => null,
                'github_url'     => 'https://github.com/Samiul1902/kidney_cancer_detection_project',
                'live_url'       => null,
                'tech_stack'     => ['Python', 'PyTorch', 'OpenCV'],
                'is_featured'    => true,
                'display_order'  => 2,
            ]
        );

        // FIX: use a different slug for Diabetic Predictor
        Project::updateOrCreate(
            ['slug' => 'diabetic-predictor'],
            [
                'title'          => 'Diabetic Predictor',
                'category'       => 'ml',
                'short_description' => 'Machine learning model to predict diabetes from patient data.',
                'long_description'  => null,
                'github_url'     => 'https://github.com/Samiul1902/diabetes-prediction-flask-app',
                'live_url'       => null,
                'tech_stack'     => ['Python', 'Scikit-learn', 'Flask'],
                'is_featured'    => true,   // set true to appear in Featured section
                'display_order'  => 3,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'iot-rc-tank'],
            [
                'title'          => 'IoT RC Tank',
                'category'       => 'iot',
                'short_description' => 'WiFi-controlled RC tank with onboard camera and sensors.',
                'long_description'  => null,
                'github_url'     => 'https://github.com/youruser/your_rc_tank_repo',
                'live_url'       => null,
                'tech_stack'     => ['ESP32', 'C++', 'MQTT'],
                'is_featured'    => false,  // stays hidden from "Featured Projects"
                'display_order'  => 4,
            ]
        );

        // -------- Skills (clear table, then insert fresh records) --------
        Skill::truncate();

        Skill::insert([
            ['name' => 'Python',                 'category' => 'backend',  'level' => 90],
            ['name' => 'PyTorch',                'category' => 'Machine Learning and Deep learning', 'level' => 80],
            ['name' => 'TensorFlow',             'category' => 'Machine Learning and Deep learning', 'level' => 80],
            ['name' => 'Laravel',                'category' => 'backend',  'level' => 80],
            ['name' => 'HTML/CSS',               'category' => 'frontend', 'level' => 90],
            ['name' => 'JavaScript',             'category' => 'frontend', 'level' => 85],
            ['name' => 'MySQL',                  'category' => 'database', 'level' => 80],
            ['name' => 'IoT & Microcontrollers', 'category' => 'iot',      'level' => 75],
        ]);

        // -------- Study history --------
        StudyHistory::truncate();

        StudyHistory::insert([
            [
                'level'       => 'BSc in Computer Science & Engineering',
                'institution' => 'Daffodil International University',
                'start_year'  => 2022,
                'end_year'    => null,
                'grade'       => 'CGPA: 3.33/4.0',
                'details'     => 'Focusing on deep learning, medical imaging and full‑stack web development.',
            ],
            [
                'level'       => 'HSC (Science)',
                'institution' => 'Bhawal Badre Alam Government College',
                'start_year'  => 2019,
                'end_year'    => 2021,
                'grade'       => 'GPA: 5.0/5.0',
                'details'     => 'Higher secondary with strong focus on mathematics and physics.',
            ],
            [
                'level'       => 'SSC (Science)',
                'institution' => 'Rani BilashMoni Govt. Boys High School',
                'start_year'  => 2017,
                'end_year'    => 2019,
                'grade'       => 'GPA: 4.89/5.0',
                'details'     => 'Higher secondary with strong focus on mathematics and physics.',
            ],
        ]);

        // -------- Achievements --------
        Achievement::truncate();

        Achievement::insert([
            [
                'title'         => 'Dean’s List',
                'institution'   => 'Daffodil International University',
                'achieved_at'   => '2024-06-01',
                'description'   => 'Awarded for outstanding academic performance.',
                'certificate_url' => null,
            ],
            [
                'title'         => 'Deep Learning Specialization',
                'institution'   => 'Online Platform',
                'achieved_at'   => '2024-08-15',
                'description'   => 'Completed multi‑course deep learning program with practical projects.',
                'certificate_url' => null,
            ],
        ]);

        // -------- Resume --------
        Resume::truncate();

        Resume::create([
            'file_path'    => 'cv/samiul_cv.pdf',
            'headline'     => 'Full‑Stack & ML‑focused CSE Student',
            'summary'      => 'Working on Laravel web apps, deep learning for medical imaging, and IoT/RC tank projects.',
            'published_at' => now(),
        ]);
    }
}
