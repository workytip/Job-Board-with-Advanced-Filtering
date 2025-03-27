<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Category;
use App\Models\Language;
use App\Models\Location;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $jobTypes = ['full-time', 'part-time', 'contract', 'freelance'];
        $statuses = ['draft', 'published', 'archived'];
        $companies = ['TechCorp', 'HealthPlus', 'EduWorld', 'FinancePro', 'CreativeStudio'];
        $titles = ['Software Engineer', 'Data Analyst', 'Project Manager', 'Graphic Designer', 'Marketing Specialist'];

         // Seed languages
         $languages = ['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'Ruby', 'Go', 'Swift'];
         foreach ($languages as $language) {
             Language::create(['name' => $language]);
         }

           // Seed locations
        $locations = [
            ['city' => 'New York', 'state' => 'NY', 'country' => 'USA'],
            ['city' => 'San Francisco', 'state' => 'CA', 'country' => 'USA'],
            ['city' => 'London', 'state' => 'England', 'country' => 'UK'],
            ['city' => 'Berlin', 'state' => 'Berlin', 'country' => 'Germany'],
            ['city' => 'Tokyo', 'state' => 'Tokyo', 'country' => 'Japan'],
        ];
        foreach ($locations as $location) {
            Location::create($location);
        }
        
        // Seed categories
        $categories = ['IT', 'Healthcare', 'Education', 'Finance', 'Design'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
         
        for ($i = 1; $i <= 50; $i++) {
            $job = Job::create([
                'title' => $titles[array_rand($titles)],
                'description' => $faker->sentence(10),
                'company_name' => $companies[array_rand($companies)],
                'salary_min' => rand(30000, 70000),
                'salary_max' => rand(80000, 150000),
                'is_remote' => rand(0, 1),
                'job_type' => $jobTypes[array_rand($jobTypes)],
                'status' => $statuses[array_rand($statuses)],
                'published_at' => rand(0, 1) ? now()->subDays(rand(1, 30)) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Assign random languages to the job
            $randomLanguages = Language::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $job->languages()->attach($randomLanguages);

             // Assign random locations to the job
            $randomLocations = Location::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $job->locations()->attach($randomLocations);

            // Assign random categories to the job
            $randomCategories = Category::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $job->categories()->attach($randomCategories);
        }
    }
}
