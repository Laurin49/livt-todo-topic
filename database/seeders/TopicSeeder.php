<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::create(['name' => 'Laravel Inertia']); 
        Topic::create(['name' => 'ILS']);
        Topic::create(['name' => 'Fitness']);
        Topic::create(['name' => 'Bücher']);
        Topic::create(['name' => 'Filme']);
        Topic::create(['name' => 'Anschaffungen']);
    }
}
