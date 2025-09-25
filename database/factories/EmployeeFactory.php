<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_number' => 'EMP' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date('Y-m-d', '2000-01-01'),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'country' => 'Indonesia',
            'national_id' => $this->faker->numerify('################'),
            'hire_date' => $this->faker->date('Y-m-d', 'now'),
            'department_id' => \App\Models\Department::factory(),
            'position_id' => \App\Models\Position::factory(),
            'employment_status' => $this->faker->randomElement(['active', 'inactive', 'terminated', 'resigned']),
            'employment_type' => $this->faker->randomElement(['permanent', 'contract', 'intern', 'freelance']),
        ];
    }
}
