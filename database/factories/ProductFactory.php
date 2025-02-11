<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => 'مربعات',
            // 'sn'=> '654654',
            // 'price'=> '1',
            // 'category' => 'بسكوت',
            // 'stock' => 10
        ];
    }
}
