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
        $topics = [
            ['id' => 1, 'title' => 'php'],
            ['id' => 2, 'title' => 'laravel'],
            ['id' => 3, 'title' => 'sql'],
            ['id' => 4, 'title' => 'mixed'],
        ];
        foreach ($topics as $topic) {
            Topic::updateOrCreate(['id' => $topic['id']], $topic);
        }
    }
}

