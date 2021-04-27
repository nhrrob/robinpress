<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nhrrob\Robinpress\Post;
use Str;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'identifier' => Str::random(10),
            'slug' => Str::slug($title),
            'title' => $title,
            'body' => $this->faker->paragraph(),
            'extra' => json_encode(['test'=>'value'])
        ];
    }

}
