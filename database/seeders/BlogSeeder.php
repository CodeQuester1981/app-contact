<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'user_id' => 1,
                'interest' => 'Archery',
                'blog_title' => 'Recurve Care',
                'blog_body' => 'Recurve bows, timeless tools of archery, demand care to maintain performance and longevity. Start by examining the limbs for cracks or delamination, signs of stress. String care is vital; regularly wax it to prevent fraying and enhance lifespan. Ensure proper brace height, adjusting if necessary for optimal shooting. Keep the bow stored in a cool, dry place to prevent warping. Avoid extreme temperatures and humidity. Regularly inspect the bowstring and limbs for wear and tear, replacing components as needed. By dedicating time to recurve bow care, you\'ll ensure it remains a faithful companion, ready to propel arrows with precision for years to come.' 
            ],
            [
                'user_id' => 1,
                'interest' => 'Dog Sled Racing',
                'blog_title' => 'How Do They Survive',
                'blog_body' => 'Brrr, it\'s enough to make anyone\'s tail curl up and freeze! But fear not, my fellow fur-enthusiasts, for these four-legged fluffy friends have some secret weapons up their paws. First off, these pups come equipped with a built-in fur coat that would make even the most fashion-forward Eskimo jealous. Their fur is so thick and cozy, it\'s basically like wearing a Snuggie all day, every day. And let\'s not forget those adorable little toe beans that never seem to get cold. These pups also have a super high metabolism, chowing down on enough food to power a small village just to stay warm. So next time you see a dog sledding team zooming by, remember that those pups are basically the Arctic Avengers, braving the cold with style and sass.' 
            ],
        ]);
    }
}
