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
    public function run(): void
    {
        // Projects
        Project::create([
            'title' => 'Smart Salon Reservation System',
            'slug' => 'smart-salon-reservation-system',
            'category' => 'web',
            'short_description' => 'Full-stack Laravel reservation & management system.',
            'long_description' => 'Built with Laravel and MySQL, includes customer booking, admin dashboard and reports.',
            'github_url' => 'https://github.com/youruser/Smart-Salon-Beauty-Parlour-Reservation-Management-System',
            'tech_stack' => ['Laravel', 'MySQL', 'PHP', 'JavaScript'],
            'is_featured' => true,
            'display_order' => 1,
        ]);

        Project::create([
            'title' => 'Kidney Cancer Detection',
            'slug' => 'kidney-cancer-detection',
            'category' => 'ml',
            'short_description' => 'Deep learning pipeline for kidney cancer detection from medical images.',
            'github_url' => 'https://github.com/youruser/kidney_cancer_detection_project',
            'tech_stack' => ['Python', 'PyTorch', 'OpenCV'],
            'is_featured' => true,
            'display_order' => 2,
        ]);

        Project::create([
            'title' => 'IoT RC Tank',
            'slug' => 'iot-rc-tank',
            'category' => 'iot',
            'short_description' => 'WiFi-controlled RC tank with on-board camera and sensors.',
            'github_url' => 'https://github.com/youruser/your_rc_tank_repo',
            'tech_stack' => ['ESP32', 'C++', 'MQTT'],
            'is_featured' => false,
            'display_order' => 3,
        ]);

        // Skills
        Skill::insert([
            ['name' => 'Python', 'category' => 'backend', 'level' => 90],
            ['name' => 'PyTorch', 'category' => 'ml', 'level' => 80],
            ['name' => 'Laravel', 'category' => 'backend', 'level' => 80],
            ['name' => 'HTML/CSS', 'category' => 'frontend', 'level' => 90],
            ['name' => 'JavaScript', 'category' => 'frontend', 'level' => 85],
            ['name' => 'MySQL', 'category' => 'database', 'level' => 80],
            ['name' => 'IoT & Microcontrollers', 'category' => 'iot', 'level' => 75],
        ]);

        // Study history
        StudyHistory::insert([
            [
                'level' => 'BSc in Computer Science & Engineering',
                'institution' => 'Your University Name',
                'start_year' => 2022,
                'end_year' => null,
                'grade' => 'CGPA: 3.8/4.0',
                'details' => 'Focusing on deep learning, medical imaging and full‑stack web development.',
            ],
            [
                'level' => 'HSC (Science)',
                'institution' => 'Your College',
                'start_year' => 2019,
                'end_year' => 2021,
                'grade' => 'GPA: 5.0/5.0',
                'details' => 'Higher secondary with strong focus on mathematics and physics.',
            ],
        ]);

        // Achievements
        Achievement::insert([
            [
                'title' => 'Dean’s List',
                'institution' => 'Your University Name',
                'achieved_at' => '2024-06-01',
                'description' => 'Awarded for outstanding academic performance.',
            ],
            [
                'title' => 'Deep Learning Specialization',
                'institution' => 'Online Platform',
                'achieved_at' => '2024-08-15',
                'description' => 'Completed multi‑course deep learning program with practical projects.',
            ],
        ]);

        // Resume
        Resume::create([
            'file_path' => 'cv/samiul_cv.pdf',   // we will upload this file later
            'headline' => 'Full‑Stack & ML‑focused CSE Student',
            'summary' => 'Working on Laravel web apps, deep learning for medical imaging, and IoT/RC tank projects.',
            'published_at' => now(),
        ]);
    }
}
