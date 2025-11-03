<?php

namespace App\Livewire;

use App\Models\Position;
use App\Models\Department;
use Livewire\Component;

class PositionCreate extends Component
{
    public $positionId = null;
    public $title = '';
    public $code = '';
    public $description = '';
    public $department_id = '';
    public $level = 'entry';
    public $min_salary = '';
    public $max_salary = '';
    public $is_active = true;

    protected $queryString = ['edit'];

    public function mount()
    {
        if (request()->has('edit')) {
            $this->positionId = request()->get('edit');
            $position = Position::find($this->positionId);

            if ($position) {
                $this->title = $position->title;
                $this->code = $position->code;
                $this->description = $position->description;
                $this->department_id = $position->department_id;
                $this->level = $position->level;
                $this->min_salary = $position->min_salary;
                $this->max_salary = $position->max_salary;
                $this->is_active = $position->is_active;
            }
        }
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:positions,code,' . $this->positionId,
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'level' => 'required|in:entry,junior,senior,lead,manager,director',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'is_active' => 'boolean',
        ];
    }

    public function save()
    {
        $this->validate();

        if ($this->positionId) {
            // Update existing position
            $position = Position::find($this->positionId);
            $position->update([
                'title' => $this->title,
                'code' => $this->code,
                'description' => $this->description,
                'department_id' => $this->department_id,
                'level' => $this->level,
                'min_salary' => $this->min_salary ?: null,
                'max_salary' => $this->max_salary ?: null,
                'is_active' => $this->is_active,
            ]);

            session()->flash('success', 'Position updated successfully.');
        } else {
            // Create new position
            Position::create([
                'title' => $this->title,
                'code' => $this->code,
                'description' => $this->description,
                'department_id' => $this->department_id,
                'level' => $this->level,
                'min_salary' => $this->min_salary ?: null,
                'max_salary' => $this->max_salary ?: null,
                'is_active' => $this->is_active,
            ]);

            session()->flash('success', 'Position created successfully.');
        }

        return redirect()->route('positions.index');
    }

    public function render()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('livewire.position-create', [
            'departments' => $departments,
        ]);
    }
}
