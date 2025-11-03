<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all positions and create one employee for each
        $positions = Position::all();

        $employees = [
            // HR Department
            [
                'position_code' => 'HR-MGR',
                'employee_number' => 'EMP001',
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'email' => 'sarah.johnson@company.com',
                'phone' => '+62812345001',
                'date_of_birth' => '1985-03-15',
                'gender' => 'female',
                'address' => 'Jl. Sudirman No. 123',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12190',
                'country' => 'Indonesia',
                'national_id' => '3171234567890001',
                'hire_date' => '2020-01-15',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'HR-SPEC',
                'employee_number' => 'EMP002',
                'first_name' => 'Dewi',
                'last_name' => 'Kartika',
                'email' => 'dewi.kartika@company.com',
                'phone' => '+62812345002',
                'date_of_birth' => '1990-06-20',
                'gender' => 'female',
                'address' => 'Jl. Gatot Subroto No. 45',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12930',
                'country' => 'Indonesia',
                'national_id' => '3171234567890002',
                'hire_date' => '2021-03-10',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],

            // IT Department
            [
                'position_code' => 'IT-DIR',
                'employee_number' => 'EMP003',
                'first_name' => 'Budi',
                'last_name' => 'Santoso',
                'email' => 'budi.santoso@company.com',
                'phone' => '+62812345003',
                'date_of_birth' => '1982-09-12',
                'gender' => 'male',
                'address' => 'Jl. Kuningan No. 78',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12940',
                'country' => 'Indonesia',
                'national_id' => '3171234567890003',
                'hire_date' => '2019-05-20',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'IT-SEN-DEV',
                'employee_number' => 'EMP004',
                'first_name' => 'Andi',
                'last_name' => 'Wijaya',
                'email' => 'andi.wijaya@company.com',
                'phone' => '+62812345004',
                'date_of_birth' => '1988-11-25',
                'gender' => 'male',
                'address' => 'Jl. Thamrin No. 56',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '10350',
                'country' => 'Indonesia',
                'national_id' => '3171234567890004',
                'hire_date' => '2020-08-15',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'IT-JUN-DEV',
                'employee_number' => 'EMP005',
                'first_name' => 'Rina',
                'last_name' => 'Putri',
                'email' => 'rina.putri@company.com',
                'phone' => '+62812345005',
                'date_of_birth' => '1995-04-18',
                'gender' => 'female',
                'address' => 'Jl. Rasuna Said No. 90',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12960',
                'country' => 'Indonesia',
                'national_id' => '3171234567890005',
                'hire_date' => '2023-01-10',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],

            // Finance Department
            [
                'position_code' => 'FIN-MGR',
                'employee_number' => 'EMP006',
                'first_name' => 'Michael',
                'last_name' => 'Chen',
                'email' => 'michael.chen@company.com',
                'phone' => '+62812345006',
                'date_of_birth' => '1984-07-08',
                'gender' => 'male',
                'address' => 'Jl. Casablanca No. 34',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12870',
                'country' => 'Indonesia',
                'national_id' => '3171234567890006',
                'hire_date' => '2019-09-01',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'FIN-ACC',
                'employee_number' => 'EMP007',
                'first_name' => 'Siti',
                'last_name' => 'Nurhaliza',
                'email' => 'siti.nurhaliza@company.com',
                'phone' => '+62812345007',
                'date_of_birth' => '1991-02-14',
                'gender' => 'female',
                'address' => 'Jl. Senopati No. 67',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12190',
                'country' => 'Indonesia',
                'national_id' => '3171234567890007',
                'hire_date' => '2021-06-15',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],

            // Marketing Department
            [
                'position_code' => 'MKT-MGR',
                'employee_number' => 'EMP008',
                'first_name' => 'Amanda',
                'last_name' => 'Wijaya',
                'email' => 'amanda.wijaya@company.com',
                'phone' => '+62812345008',
                'date_of_birth' => '1987-12-03',
                'gender' => 'female',
                'address' => 'Jl. Tebet Raya No. 12',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12820',
                'country' => 'Indonesia',
                'national_id' => '3171234567890008',
                'hire_date' => '2020-02-20',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'MKT-SPEC',
                'employee_number' => 'EMP009',
                'first_name' => 'Reza',
                'last_name' => 'Pratama',
                'email' => 'reza.pratama@company.com',
                'phone' => '+62812345009',
                'date_of_birth' => '1993-08-22',
                'gender' => 'male',
                'address' => 'Jl. Kebayoran No. 88',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12120',
                'country' => 'Indonesia',
                'national_id' => '3171234567890009',
                'hire_date' => '2022-04-11',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],

            // Sales Department
            [
                'position_code' => 'SALES-MGR',
                'employee_number' => 'EMP010',
                'first_name' => 'David',
                'last_name' => 'Gunawan',
                'email' => 'david.gunawan@company.com',
                'phone' => '+62812345010',
                'date_of_birth' => '1986-05-17',
                'gender' => 'male',
                'address' => 'Jl. Kemang No. 45',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12730',
                'country' => 'Indonesia',
                'national_id' => '3171234567890010',
                'hire_date' => '2020-07-01',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'SALES-REP',
                'employee_number' => 'EMP011',
                'first_name' => 'Lisa',
                'last_name' => 'Anggraini',
                'email' => 'lisa.anggraini@company.com',
                'phone' => '+62812345011',
                'date_of_birth' => '1996-01-30',
                'gender' => 'female',
                'address' => 'Jl. Pramuka No. 23',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '13120',
                'country' => 'Indonesia',
                'national_id' => '3171234567890011',
                'hire_date' => '2023-03-15',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],

            // Operations Department
            [
                'position_code' => 'OPS-MGR',
                'employee_number' => 'EMP012',
                'first_name' => 'Ahmad',
                'last_name' => 'Hidayat',
                'email' => 'ahmad.hidayat@company.com',
                'phone' => '+62812345012',
                'date_of_birth' => '1983-10-05',
                'gender' => 'male',
                'address' => 'Jl. Cilandak No. 77',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12560',
                'country' => 'Indonesia',
                'national_id' => '3171234567890012',
                'hire_date' => '2019-11-20',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],

            // Customer Service Department
            [
                'position_code' => 'CS-MGR',
                'employee_number' => 'EMP013',
                'first_name' => 'Nina',
                'last_name' => 'Kusuma',
                'email' => 'nina.kusuma@company.com',
                'phone' => '+62812345013',
                'date_of_birth' => '1989-03-28',
                'gender' => 'female',
                'address' => 'Jl. Fatmawati No. 101',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12410',
                'country' => 'Indonesia',
                'national_id' => '3171234567890013',
                'hire_date' => '2021-01-05',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
            [
                'position_code' => 'CS-REP',
                'employee_number' => 'EMP014',
                'first_name' => 'Tommy',
                'last_name' => 'Setiawan',
                'email' => 'tommy.setiawan@company.com',
                'phone' => '+62812345014',
                'date_of_birth' => '1997-09-11',
                'gender' => 'male',
                'address' => 'Jl. Menteng No. 33',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '10310',
                'country' => 'Indonesia',
                'national_id' => '3171234567890014',
                'hire_date' => '2023-05-20',
                'employment_status' => 'active',
                'employment_type' => 'permanent',
            ],
        ];

        foreach ($employees as $employeeData) {
            $position = Position::where('code', $employeeData['position_code'])->first();

            if ($position) {
                unset($employeeData['position_code']);
                $employeeData['position_id'] = $position->id;
                $employeeData['department_id'] = $position->department_id;

                Employee::create($employeeData);
            }
        }
    }
}
