<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $imageUrl = "https://picsum.photos/800/600?random=$i";
            $imageContents = file_get_contents($imageUrl);
            $imageName = "uploads/post_$i.jpg";
            
            Storage::disk('public')->put($imageName, $imageContents);
            
            Post::create([
                'user_id' => 1,
                'title' => fake()->sentence(),
                'content' => fake()->paragraphs(3, true),
                'image' => $imageName,
                'category_id' => rand(1, 5),
            ]);
        }
    }
}
