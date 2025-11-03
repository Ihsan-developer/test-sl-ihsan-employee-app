<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $showDeleteModal = false;
    public $departmentToDelete = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($departmentId)
    {
        $this->departmentToDelete = $departmentId;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->departmentToDelete) {
            $department = Department::find($this->departmentToDelete);

            if ($department) {
                // Check if department has employees
                if ($department->employees()->count() > 0) {
                    session()->flash('error', 'Cannot delete department with employees.');
                } else {
                    $department->delete();
                    session()->flash('success', 'Department deleted successfully.');
                }
            }
        }

        $this->showDeleteModal = false;
        $this->departmentToDelete = null;
    }

    public function toggleStatus($departmentId)
    {
        $department = Department::find($departmentId);
        if ($department) {
            $department->is_active = !$department->is_active;
            $department->save();
            session()->flash('success', 'Department status updated.');
        }
    }

    public function render()
    {
        $departments = Department::with(['manager', 'employees'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.department-index', [
            'departments' => $departments,
        ]);
    }
}
