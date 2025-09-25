<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EmployeeCreate extends Component
{
    use WithFileUploads;

    public $employee_number;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $date_of_birth;
    public $gender;
    public $address;
    public $city;
    public $state;
    public $postal_code;
    public $country = 'Indonesia';
    public $national_id;
    public $hire_date;
    public $department_id;
    public $position_id;
    public $manager_id;
    public $employment_status = 'active';
    public $employment_type = 'permanent';
    public $profile_photo;

    protected $rules = [
        'employee_number' => 'required|string|max:50|unique:employees,employee_number',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:employees,email',
        'phone' => 'nullable|string|max:20',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'address' => 'nullable|string',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
        'country' => 'required|string|max:100',
        'national_id' => 'nullable|string|max:50',
        'hire_date' => 'required|date',
        'department_id' => 'required|exists:departments,id',
        'position_id' => 'required|exists:positions,id',
        'manager_id' => 'nullable|exists:employees,id',
        'employment_status' => 'required|in:active,inactive,terminated,resigned',
        'employment_type' => 'required|in:permanent,contract,intern,freelance',
        'profile_photo' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->employee_number = 'EMP' . str_pad(Employee::count() + 1, 4, '0', STR_PAD_LEFT);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'employee_number' => $this->employee_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'national_id' => $this->national_id,
            'hire_date' => $this->hire_date,
            'department_id' => $this->department_id,
            'position_id' => $this->position_id,
            'manager_id' => $this->manager_id,
            'employment_status' => $this->employment_status,
            'employment_type' => $this->employment_type,
        ];

        if ($this->profile_photo) {
            $data['profile_photo'] = $this->profile_photo->store('employee-photos', 'public');
        }

        Employee::create($data);

        session()->flash('message', 'Employee created successfully.');
        
        return redirect()->route('employees.index');
    }

    public function render()
    {
        $departments = Department::where('is_active', true)->get();
        $positions = Position::where('is_active', true)->get();
        $managers = Employee::where('employment_status', 'active')->get();

        return view('livewire.employee-create', [
            'departments' => $departments,
            'positions' => $positions,
            'managers' => $managers,
        ]);
    }
}
