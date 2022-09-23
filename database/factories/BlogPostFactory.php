<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $text = $this->faker->slug();
        return [
            'title' => BlogPostHelper::placeholder(1, $text),
            'user_id' => mt_rand(1, 10),
            'category_id' => mt_rand(1, 3),
            'slug' => BlogPostHelper::placeholder(0, $text),
            'thumbnail' => $this->faker->imageUrl(397, 241, 'campus'),
            'created_at' => now()->addSecond(mt_rand(0, 9999999)),
            'updated_at' => now()->addSecond(mt_rand(0, 9999999)),
            'published_at' => BlogPostHelper::Published(mt_rand(0, 2)),
            'excerpt' => $this->faker->words(20, true),
            'body' => '<p>' . $this->faker->paragraph(5) . '</p><p>' . $this->faker->paragraph(5) . '</p><p>' . $this->faker->paragraph(5) . '</p><p>' . $this->faker->paragraph(5) . '</p>',
        ];
    }
}

class BlogPostHelper
{
    public function placeholder(int $input, string $text)
    {
        switch ($input) {
            case '0':
                return $text;
                break;
            default:
                return str_replace('-', ' ', $text);
                break;
        }
    }
    public function Published(int $input)
    {
        switch ($input) {
            case 0:
                return null;
            default:
                return now()->addSecond(mt_rand(0, 9999999));
                break;
        }
    }
}
