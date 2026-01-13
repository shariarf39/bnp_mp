<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'image' => '',
                'title' => 'মানবিক সহায়তা',
                'description' => 'দরিদ্র পরিবারে খাদ্য সামগ্রী বিতরণ',
                'category' => 'social',
                'order' => 1,
                'active' => true
            ],
            [
                'image' => '',
                'title' => 'স্বাস্থ্যসেবা কর্মসূচি',
                'description' => 'বিনামূল্যে চিকিৎসা শিবির',
                'category' => 'health',
                'order' => 2,
                'active' => true
            ],
            [
                'image' => '',
                'title' => 'শিক্ষা সহায়তা',
                'description' => 'মেধাবী শিক্ষার্থীদের বৃত্তি প্রদান',
                'category' => 'education',
                'order' => 3,
                'active' => true
            ],
            [
                'image' => '',
                'title' => 'জনসভা ও মিটিং',
                'description' => 'জনগণের সাথে সরাসরি মতবিনিময়',
                'category' => 'events',
                'order' => 4,
                'active' => true
            ],
            [
                'image' => '',
                'title' => 'শীতবস্ত্র বিতরণ',
                'description' => 'শীতার্ত মানুষের মাঝে কম্বল ও শীতবস্ত্র বিতরণ',
                'category' => 'social',
                'order' => 5,
                'active' => true
            ],
            [
                'image' => '',
                'title' => 'স্বাস্থ্য সচেতনতা',
                'description' => 'জনগণকে স্বাস্থ্য বিষয়ে সচেতন করা',
                'category' => 'health',
                'order' => 6,
                'active' => true
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}

