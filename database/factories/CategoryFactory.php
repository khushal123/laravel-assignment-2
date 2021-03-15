<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;
    protected $categoryNames = ['Sports', 'Science & Tech', 'Pop Cultre'];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->categoryNames[rand(0, count($this->categoryNames)-1)],
            'image_url' => 'https://lakeridgenewsonline.com/wp-content/uploads/2020/05/IMG_4449.jpg',
        ];
    }
}
