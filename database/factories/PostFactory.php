<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->realText(rand(11,50));
        $short_title = $title;
        if(strlen($title)>30){
            $short_title= substr($title,0,27);
            $short_title .= '...';
        }
        $created = $this->faker->dateTimeBetween('-30 days', '-1 days');
        return [
            //
            'title' =>$title,
            'author_id' =>rand(1,5),
            'short_title' => $short_title,
            'descr' => $this->faker->realText(rand(100,500)),
            'created_at' => $created,
            'updated_at' => $created,
        ];
    }
}
