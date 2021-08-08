<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user =\App\Models\User::pluck('id')->toArray();
        $category =Categories::pluck('id')->toArray();
        return [
            'category_id'=>$this->faker->randomElement($category),
            'name'=>$this->faker->name(),
            'price'=>$this->faker->numberBetween(),
            'img'=>$this->faker->name(),
            'user_id'=>$this->faker->randomElement($user)
        ];
    }
}
