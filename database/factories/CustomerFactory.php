<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Default values (fallback if no input data is provided)
        return [
            'name' => 'Default Name',
            'phone' => '0000000000',
        ];
    }
    public function withData(array $data): self
    {
        return $this->state([
            'name' => $data['name'] ?? $this->definition()['name'],
            'phone' => $data['phone'] ?? $this->definition()['phone'],
        ]);
    }
}
