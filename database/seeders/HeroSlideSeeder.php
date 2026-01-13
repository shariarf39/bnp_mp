<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'title' => 'জনগণের সেবায় নিবেদিত',
                'subtitle' => 'আমরা দেশের উন্নয়ন এবং সমৃদ্ধির জন্য কাজ করছি',
                'badge_text' => 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)',
                'button_text' => 'আজই যোগ দিন',
                'button_url' => '/contact',
                'secondary_button_text' => 'আরও জানুন',
                'secondary_button_url' => '/about',
                'image' => 'hero-slides/slide1.jpg',
                'order' => 1,
                'active' => true,
            ],
            [
                'title' => 'গণতন্ত্র ও ন্যায়বিচার',
                'subtitle' => 'সকল নাগরিকের অধিকার রক্ষায় আমরা প্রতিশ্রুতিবদ্ধ',
                'badge_text' => 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)',
                'button_text' => 'যোগাযোগ করুন',
                'button_url' => '/contact',
                'secondary_button_text' => 'বিস্তারিত',
                'secondary_button_url' => '/about',
                'image' => 'hero-slides/slide2.jpg',
                'order' => 2,
                'active' => true,
            ],
            [
                'title' => 'শিক্ষা ও স্বাস্থ্যসেবা',
                'subtitle' => 'সবার জন্য মানসম্মত শিক্ষা এবং স্বাস্থ্যসেবা নিশ্চিত করা আমাদের লক্ষ্য',
                'badge_text' => 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)',
                'button_text' => 'সাপোর্ট করুন',
                'button_url' => '/contact',
                'secondary_button_text' => 'আরও পড়ুন',
                'secondary_button_url' => '/about',
                'image' => 'hero-slides/slide3.jpg',
                'order' => 3,
                'active' => true,
            ],
            [
                'title' => 'অর্থনৈতিক সমৃদ্ধি',
                'subtitle' => 'কর্মসংস্থান সৃষ্টি এবং অর্থনৈতিক প্রগতির মাধ্যমে সবার জীবনমান উন্নয়ন',
                'badge_text' => 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)',
                'button_text' => 'আজই যোগ দিন',
                'button_url' => '/contact',
                'secondary_button_text' => 'আমাদের পরিকল্পনা',
                'secondary_button_url' => '/about',
                'image' => 'hero-slides/slide4.jpg',
                'order' => 4,
                'active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }
    }
}
