<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Sales Representative',
                'slug' => 'sales-representative',
                'department' => 'Sales',
                'location' => 'Algiers',
                'type' => 'Full-time',
                'experience' => '2-4 years',
                'description' => 'Drive sales growth by building relationships with retailers and business partners across your assigned territory.',
                'salary' => 'Competitive',
                'status' => 'Published',
            ],
            [
                'title' => 'Distribution Coordinator',
                'slug' => 'distribution-coordinator',
                'department' => 'Distribution',
                'location' => 'Oran',
                'type' => 'Full-time',
                'experience' => '3-5 years',
                'description' => 'Coordinate product distribution operations ensuring timely delivery to partners across multiple provinces.',
                'salary' => 'Competitive',
                'status' => 'Published',
            ],
            [
                'title' => 'Warehouse Assistant',
                'slug' => 'warehouse-assistant',
                'department' => 'Warehouse',
                'location' => 'Algiers',
                'type' => 'Full-time',
                'experience' => '1-2 years',
                'description' => 'Support warehouse operations including inventory management, order processing, and product organization.',
                'salary' => 'Competitive',
                'status' => 'Published',
            ],
            [
                'title' => 'Customer Support Agent',
                'slug' => 'customer-support-agent',
                'department' => 'Customer Support',
                'location' => 'Constantine',
                'type' => 'Full-time',
                'experience' => '1-3 years',
                'description' => 'Provide excellent support to retail partners, handling inquiries and resolving issues professionally.',
                'salary' => 'Competitive',
                'status' => 'Published',
            ],
            [
                'title' => 'Marketing Executive',
                'slug' => 'marketing-executive',
                'department' => 'Marketing',
                'location' => 'Algiers',
                'type' => 'Full-time',
                'experience' => '2-4 years',
                'description' => 'Develop and execute marketing strategies to promote Ooredoo products and strengthen brand presence.',
                'salary' => 'Competitive',
                'status' => 'Published',
            ],
            [
                'title' => 'Administrative Assistant',
                'slug' => 'administrative-assistant',
                'department' => 'Administration',
                'location' => 'Blida',
                'type' => 'Full-time',
                'experience' => '1-2 years',
                'description' => 'Provide administrative support including document management, scheduling, and office coordination.',
                'salary' => 'Competitive',
                'status' => 'Published',
            ],
        ];

        foreach ($jobs as $jobData) {
            Job::firstOrCreate(
                ['slug' => $jobData['slug']],
                $jobData
            );
        }
    }
}
