<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "admin_id" => $this->faker->unique()->randomDigit(),
            "name" => $this->faker->word(), 
            "query" => $this->faker->sentence(), 
            "latitude" => $this->faker->randomFloat(), 
            "longtitude" => $this->faker->randomFloat(), 
            "zoom" => $this->faker->randomNumber(), 
        ];
    }
}
