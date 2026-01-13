<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // Hero Section
            ['key' => 'hero_badge_text', 'value' => 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)', 'section' => 'hero'],
            ['key' => 'hero_title', 'value' => 'একটি সুন্দর ও ঐক্যবদ্ধ আগামী গড়ার প্রত্যয়ে', 'section' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।', 'section' => 'hero'],
            ['key' => 'hero_button_primary', 'value' => 'আজই যোগ দিন', 'section' => 'hero'],
            ['key' => 'hero_button_secondary', 'value' => 'আরও জানুন', 'section' => 'hero'],
            
            // Stats Section
            ['key' => 'stat1_number', 'value' => '১০+ ', 'section' => 'stats'],
            ['key' => 'stat1_label', 'value' => 'বছর সমাজ সেবা', 'section' => 'stats'],
            ['key' => 'stat2_number', 'value' => '৫০+ ', 'section' => 'stats'],
            ['key' => 'stat2_label', 'value' => 'উদ্যোগ/প্রকল্প', 'section' => 'stats'],
            ['key' => 'stat3_number', 'value' => '২৪/৭ ', 'section' => 'stats'],
            ['key' => 'stat3_label', 'value' => 'জনগণের পাশে', 'section' => 'stats'],
            
            // Goals Section
            ['key' => 'goals_title', 'value' => 'আমাদের লক্ষ্য', 'section' => 'goals'],
            ['key' => 'goals_subtitle', 'value' => 'স্বাস্থ্য, শিক্ষা, কর্মসংস্থান, সামাজিক নিরাপত্তা এবং মানবিক সহায়তা—এগুলোকে অগ্রাধিকার দিয়ে টেকসই উন্নয়ন।', 'section' => 'goals'],
            ['key' => 'goal1_icon', 'value' => 'balance-scale', 'section' => 'goals'],
            ['key' => 'goal1_title', 'value' => 'গণতন্ত্র ও ন্যায়বিচার', 'section' => 'goals'],
            ['key' => 'goal1_description', 'value' => 'সকল নাগরিকের ভোটের অধিকার রক্ষা এবং স্বাধীন বিচার ব্যবস্থা নিশ্চিত করা আমাদের প্রধান লক্ষ্য।', 'section' => 'goals'],
            ['key' => 'goal2_icon', 'value' => 'graduation-cap', 'section' => 'goals'],
            ['key' => 'goal2_title', 'value' => 'শিক্ষা ও স্বাস্থ্যসেবা', 'section' => 'goals'],
            ['key' => 'goal2_description', 'value' => 'মানসম্মত শিক্ষা এবং স্বাস্থ্যসেবা সবার জন্য সহজলভ্য করা এবং দক্ষ জনশক্তি গড়ে তোলা।', 'section' => 'goals'],
            ['key' => 'goal3_icon', 'value' => 'chart-line', 'section' => 'goals'],
            ['key' => 'goal3_title', 'value' => 'দেশীয় অর্থনীতি', 'section' => 'goals'],
            ['key' => 'goal3_description', 'value' => 'দেশের অর্থনৈতিক উন্নয়ন ও কর্মসংস্থানের সুযোগ বৃদ্ধির জন্য কাজ করা এবং নতুন উদ্যোগ ও পরিকল্পনার মাধ্যমে দেশের অর্থনীতি শক্তিশালী করা।', 'section' => 'goals'],
            ['key' => 'goal4_icon', 'value' => 'venus', 'section' => 'goals'],
            ['key' => 'goal4_title', 'value' => 'নারী অধিকার', 'section' => 'goals'],
            ['key' => 'goal4_description', 'value' => 'নারী অধিকারের প্রতি প্রতিশ্রুতিবদ্ধ। এমন একটি সমাজ গড়ে তোলা যেখানে নারীরা সমান অধিকার ও মর্যাদা পাবে।', 'section' => 'goals'],
            ['key' => 'goal5_icon', 'value' => 'globe', 'section' => 'goals'],
            ['key' => 'goal5_title', 'value' => 'বৈদেশিক নীতি', 'section' => 'goals'],
            ['key' => 'goal5_description', 'value' => 'শক্তিশালী এবং বন্ধুত্বপূর্ণ বৈদেশিক নীতি গড়ে তোলা যা দেশের আন্তর্জাতিক সম্পর্ককে উন্নত করবে এবং বাণিজ্যিক সুযোগ সৃষ্টি করবে।', 'section' => 'goals'],
            ['key' => 'goal6_icon', 'value' => 'book-open', 'section' => 'goals'],
            ['key' => 'goal6_title', 'value' => 'শিক্ষার প্রতি মনোযোগ', 'section' => 'goals'],
            ['key' => 'goal6_description', 'value' => 'শিক্ষার মান উন্নয়ন এবং সবার জন্য সমান শিক্ষার সুযোগ নিশ্চিত করা। শিক্ষিত সমাজই দেশের পথ প্রদর্শক এবং উন্নয়নের চালিকা শক্তি।', 'section' => 'goals'],
            
            // Leader Section
            ['key' => 'leader_image', 'value' => '', 'section' => 'leader'],
            ['key' => 'leader_badge', 'value' => 'তরুণ প্রজন্মের আদর্শ', 'section' => 'leader'],
            ['key' => 'leader_title', 'value' => 'তরুণ প্রজন্মের আদর্শিক নেতা', 'section' => 'leader'],
            ['key' => 'leader_description', 'value' => 'সকলের অংশগ্রহণে উন্নয়ন—মানুষের অধিকার, ন্যায়বিচার ও সমান সুযোগ নিশ্চিত করাই লক্ষ্য।', 'section' => 'leader'],
            ['key' => 'leader_bio', 'value' => 'রাজনৈতিক জীবনের শুরু হয়েছিল ছাত্র রাজনীতিতে যোগদানের মাধ্যমে। একজন মেধাবী ছাত্রনেতা হিসেবে তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন।', 'section' => 'leader'],
            ['key' => 'leader_value1', 'value' => 'জনসেবায় স্বচ্ছতা ও জবাবদিহিতা', 'section' => 'leader'],
            ['key' => 'leader_value2', 'value' => 'দ্রুত সাড়া ও বাস্তবসম্মত উদ্যোগ', 'section' => 'leader'],
            ['key' => 'leader_value3', 'value' => 'সমাজের প্রতিটি মানুষের অন্তর্ভুক্তি', 'section' => 'leader'],
            ['key' => 'leader_value4', 'value' => 'শিক্ষা-স্বাস্থ্যকে অগ্রাধিকার', 'section' => 'leader'],
            
            // Footer Contact Section
            ['key' => 'footer_about_title', 'value' => 'আমাদের সম্পর্কে', 'section' => 'footer'],
            ['key' => 'footer_about_text', 'value' => 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।', 'section' => 'footer'],
            ['key' => 'footer_facebook_url', 'value' => '#', 'section' => 'footer'],
            ['key' => 'footer_youtube_url', 'value' => '#', 'section' => 'footer'],
            ['key' => 'footer_twitter_url', 'value' => '#', 'section' => 'footer'],
            ['key' => 'footer_phone', 'value' => '+৮৮০ ১XXX-XXXXXX', 'section' => 'footer'],
            ['key' => 'footer_email', 'value' => 'info@example.com', 'section' => 'footer'],
            ['key' => 'footer_address', 'value' => 'ঢাকা, বাংলাদেশ', 'section' => 'footer'],
            ['key' => 'footer_copyright', 'value' => 'BNP রাজনৈতিক নেতা। সর্বস্বত্ব সংরক্ষিত।', 'section' => 'footer'],
            
            // About Page Logo
            ['key' => 'about_logo', 'value' => '', 'section' => 'about'],
        ];

        foreach ($contents as $content) {
            SiteContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}
