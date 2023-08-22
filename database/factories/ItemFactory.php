<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{/**
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
        return [
            'itemName' => $this->faker->word(),
            'description' => $this->faker->paragraph(5),
            'size' => $this->faker->numberBetween(60, 200),
            'price' => $this->faker->numberBetween(5, 200),
            'brand' => $this->faker->name(),
            'condition'=> 'used',
            'dateListed' => $this->faker->date(),
            'tags' => 'jeans',
            'status'=> 'available',
            'quantity' => $this->faker->numberBetween(1, 5),
            'category_id' => 1, // Assuming the default category ID is 1
            'sellerUserId' => 1, // Assuming the default user ID is 1
        ];
    }
}
