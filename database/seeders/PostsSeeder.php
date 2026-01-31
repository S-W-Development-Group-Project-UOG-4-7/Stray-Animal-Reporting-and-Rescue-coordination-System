<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostsSeeder extends Seeder
{
    public function run()
    {
        // Create demo users if not exists
        $users = User::factory()->count(5)->create();
        
        $posts = [
            [
                'title' => 'The Importance of Community Feeding Programs',
                'description' => 'In our neighborhood, we started a community feeding program for stray animals. Every Sunday, volunteers gather to prepare and distribute food. The impact has been incredible - healthier animals and fewer conflicts.',
                'type' => 'article',
                'media_url' => null,
                'media_type' => null,
                'likes' => 42,
            ],
            [
                'title' => 'Rescuing Abandoned Puppies - Full Documentary',
                'description' => 'Follow our journey as we rescue a litter of abandoned puppies found in an empty lot. This video documents their recovery and journey to finding forever homes.',
                'type' => 'video',
                'media_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'media_type' => 'youtube',
                'likes' => 128,
            ],
            [
                'title' => 'Before & After: Miracle the Street Cat',
                'description' => 'Found Miracle malnourished and injured on the streets. After 3 months of care, she\'s now a healthy, loving companion. Never underestimate the power of care and compassion.',
                'type' => 'image',
                'media_url' => null,
                'media_type' => null,
                'likes' => 56,
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create(array_merge($postData, [
                'user_id' => $users->random()->id,
                'liked_by' => $users->random(rand(3, 10))->pluck('id')->toArray()
            ]));

            // Add comments
            $commentCount = rand(2, 5);
            for ($i = 0; $i < $commentCount; $i++) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                    'content' => $this->generateComment($post->title)
                ]);
            }
        }

        // Create more random posts
        Post::factory()->count(20)->create([
            'user_id' => $users->random()->id
        ])->each(function ($post) use ($users) {
            $commentCount = rand(0, 8);
            for ($i = 0; $i < $commentCount; $i++) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                    'content' => $this->generateComment($post->title)
                ]);
            }
        });
    }

    private function generateComment($postTitle)
    {
        $comments = [
            "This is amazing! Thank you for sharing.",
            "How can I help with this in my local area?",
            "The transformation is incredible to see.",
            "This warms my heart. Thank you for your work!",
            "I've had similar experiences in my neighborhood.",
            "Do you have any advice for someone starting out?",
            "The before and after photos are stunning.",
            "This gives me so much hope for these animals.",
            "What was the biggest challenge you faced?",
            "Thank you for raising awareness about this issue."
        ];

        return $comments[array_rand($comments)];
    }
}