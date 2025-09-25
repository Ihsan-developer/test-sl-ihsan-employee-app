<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'code' => strtoupper($this->faker->unique()->lexify('???-???')),
            'description' => $this->faker->sentence(),
            'department_id' => \App\Models\Department::factory(),
            'level' => $this->faker->randomElement(['entry', 'junior', 'senior', 'lead', 'manager', 'director']),
            'min_salary' => $this->faker->numberBetween(5000000, 10000000),
            'max_salary' => $this->faker->numberBetween(10000000, 30000000),
            'is_active' => true,
        ];
    }
}
