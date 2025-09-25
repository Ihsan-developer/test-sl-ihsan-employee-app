<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hrDept = Department::where('code', 'HR')->first();
        $itDept = Department::where('code', 'IT')->first();
        $finDept = Department::where('code', 'FIN')->first();
        $mktDept = Department::where('code', 'MKT')->first();
        $salesDept = Department::where('code', 'SALES')->first();
        $opsDept = Department::where('code', 'OPS')->first();
        $csDept = Department::where('code', 'CS')->first();

        $positions = [
            // HR Positions
            [
                'title' => 'HR Manager',
                'code' => 'HR-MGR',
                'description' => 'Manages human resources department and policies.',
                'department_id' => $hrDept->id,
                'level' => 'manager',
                'min_salary' => 15000000,
                'max_salary' => 25000000,
                'is_active' => true,
            ],
            [
                'title' => 'HR Specialist',
                'code' => 'HR-SPEC',
                'description' => 'Handles recruitment and employee relations.',
                'department_id' => $hrDept->id,
                'level' => 'senior',
                'min_salary' => 8000000,
                'max_salary' => 12000000,
                'is_active' => true,
            ],

            // IT Positions
            [
                'title' => 'IT Director',
                'code' => 'IT-DIR',
                'description' => 'Leads technology strategy and infrastructure.',
                'department_id' => $itDept->id,
                'level' => 'director',
                'min_salary' => 30000000,
                'max_salary' => 50000000,
                'is_active' => true,
            ],
            [
                'title' => 'Senior Developer',
                'code' => 'IT-SEN-DEV',
                'description' => 'Develops and maintains software applications.',
                'department_id' => $itDept->id,
                'level' => 'senior',
                'min_salary' => 12000000,
                'max_salary' => 20000000,
                'is_active' => true,
            ],
            [
                'title' => 'Junior Developer',
                'code' => 'IT-JUN-DEV',
                'description' => 'Assists in software development projects.',
                'department_id' => $itDept->id,
                'level' => 'junior',
                'min_salary' => 6000000,
                'max_salary' => 10000000,
                'is_active' => true,
            ],

            // Finance Positions
            [
                'title' => 'Finance Manager',
                'code' => 'FIN-MGR',
                'description' => 'Manages financial planning and reporting.',
                'department_id' => $finDept->id,
                'level' => 'manager',
                'min_salary' => 15000000,
                'max_salary' => 25000000,
                'is_active' => true,
            ],
            [
                'title' => 'Accountant',
                'code' => 'FIN-ACC',
                'description' => 'Handles accounting and financial records.',
                'department_id' => $finDept->id,
                'level' => 'senior',
                'min_salary' => 7000000,
                'max_salary' => 12000000,
                'is_active' => true,
            ],

            // Marketing Positions
            [
                'title' => 'Marketing Manager',
                'code' => 'MKT-MGR',
                'description' => 'Leads marketing strategies and campaigns.',
                'department_id' => $mktDept->id,
                'level' => 'manager',
                'min_salary' => 12000000,
                'max_salary' => 20000000,
                'is_active' => true,
            ],
            [
                'title' => 'Marketing Specialist',
                'code' => 'MKT-SPEC',
                'description' => 'Executes marketing campaigns and content creation.',
                'department_id' => $mktDept->id,
                'level' => 'senior',
                'min_salary' => 6000000,
                'max_salary' => 10000000,
                'is_active' => true,
            ],

            // Sales Positions
            [
                'title' => 'Sales Manager',
                'code' => 'SALES-MGR',
                'description' => 'Manages sales team and strategies.',
                'department_id' => $salesDept->id,
                'level' => 'manager',
                'min_salary' => 10000000,
                'max_salary' => 18000000,
                'is_active' => true,
            ],
            [
                'title' => 'Sales Representative',
                'code' => 'SALES-REP',
                'description' => 'Handles customer acquisition and sales.',
                'department_id' => $salesDept->id,
                'level' => 'entry',
                'min_salary' => 5000000,
                'max_salary' => 8000000,
                'is_active' => true,
            ],

            // Operations Positions
            [
                'title' => 'Operations Manager',
                'code' => 'OPS-MGR',
                'description' => 'Manages daily operations and processes.',
                'department_id' => $opsDept->id,
                'level' => 'manager',
                'min_salary' => 12000000,
                'max_salary' => 20000000,
                'is_active' => true,
            ],

            // Customer Service Positions
            [
                'title' => 'Customer Service Manager',
                'code' => 'CS-MGR',
                'description' => 'Manages customer service team and operations.',
                'department_id' => $csDept->id,
                'level' => 'manager',
                'min_salary' => 8000000,
                'max_salary' => 15000000,
                'is_active' => true,
            ],
            [
                'title' => 'Customer Service Representative',
                'code' => 'CS-REP',
                'description' => 'Provides customer support and assistance.',
                'department_id' => $csDept->id,
                'level' => 'entry',
                'min_salary' => 4000000,
                'max_salary' => 7000000,
                'is_active' => true,
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
