<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->jobTitle();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => Str::random(50),
            'price' => fake()->randomFloat(2, 50, 1000),
            'created_at' => fake()->dateTime()
        ];
    }
}
