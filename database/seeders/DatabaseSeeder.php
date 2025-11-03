<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // Seed departments, positions, and employees
        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
        ]);

        // Create employee users for first 3 employees
        $employees = \App\Models\Employee::limit(3)->get();
        foreach ($employees as $index => $employee) {
            $user = User::factory()->create([
                'name' => $employee->full_name,
                'email' => strtolower($employee->first_name) . '@example.com',
                'role' => 'employee',
            ]);

            // Link user to employee
            $employee->update(['user_id' => $user->id]);
        }
    }
}
