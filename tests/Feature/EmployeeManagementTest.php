<?php

use App\Models\User;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;

test('user can view dashboard', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/dashboard');
    
    $response->assertStatus(200);
    $response->assertSee('Dashboard');
});

test('user can view employees index page', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/employees');
    
    $response->assertStatus(200);
    $response->assertSee('Employees');
});

test('user can view employee create page', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/employees/create');
    
    $response->assertStatus(200);
    $response->assertSee('Create Employee');
});

test('user can create an employee', function () {
    $user = User::factory()->create();
    $department = Department::factory()->create();
    $position = Position::factory()->create(['department_id' => $department->id]);
    
    $employeeData = [
        'employee_number' => 'EMP0001',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'hire_date' => '2024-01-01',
        'department_id' => $department->id,
        'position_id' => $position->id,
        'employment_status' => 'active',
        'employment_type' => 'permanent',
        'country' => 'Indonesia',
    ];
    
    $response = $this->actingAs($user)->post('/employees', $employeeData);
    
    $this->assertDatabaseHas('employees', [
        'employee_number' => 'EMP0001',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
    ]);
});

test('user can view departments index page', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/departments');
    
    $response->assertStatus(200);
    $response->assertSee('Departments');
});

test('user can view positions index page', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/positions');
    
    $response->assertStatus(200);
    $response->assertSee('Positions');
});
