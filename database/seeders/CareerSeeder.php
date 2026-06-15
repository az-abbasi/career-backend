<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    public function run()
    {
        $careers = [
            [
                'title' => 'Software Engineer',
                'description' => 'Build and maintain software applications and systems.',
                'salary_range' => '$70,000 - $120,000/year',
                'demand_level' => 'Very High',
                'required_skills' => json_encode(['Python', 'JavaScript', 'React', 'Node.js']),
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'Analyze large datasets to find useful business insights.',
                'salary_range' => '$80,000 - $130,000/year',
                'demand_level' => 'High',
                'required_skills' => json_encode(['Python', 'Machine Learning', 'SQL', 'Statistics']),
            ],
            [
                'title' => 'AI Engineer',
                'description' => 'Design and build artificial intelligence systems.',
                'salary_range' => '$90,000 - $150,000/year',
                'demand_level' => 'Very High',
                'required_skills' => json_encode(['Python', 'TensorFlow', 'Deep Learning', 'NLP']),
            ],
            [
                'title' => 'Web Developer',
                'description' => 'Build and design websites and web applications.',
                'salary_range' => '$60,000 - $110,000/year',
                'demand_level' => 'High',
                'required_skills' => json_encode(['HTML', 'CSS', 'JavaScript', 'React']),
            ],
            [
                'title' => 'Cybersecurity Expert',
                'description' => 'Protect organizations from cyber threats.',
                'salary_range' => '$75,000 - $125,000/year',
                'demand_level' => 'High',
                'required_skills' => json_encode(['Networking', 'Ethical Hacking', 'Linux']),
            ],
        ];

        foreach ($careers as $career) {
            Career::create($career);
        }
    }
}