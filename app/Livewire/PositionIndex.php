<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class PositionIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $departmentFilter = '';
    public $showDeleteModal = false;
    public $positionToDelete = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingDepartmentFilter()
    {
        $this->resetPage();
    }

    public function confirmDelete($positionId)
    {
        $this->positionToDelete = $positionId;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->positionToDelete) {
            $position = Position::find($this->positionToDelete);

            if ($position) {
                // Check if position has employees
                if ($position->employees()->count() > 0) {
                    session()->flash('error', 'Cannot delete position with employees.');
                } else {
                    $position->delete();
                    session()->flash('success', 'Position deleted successfully.');
                }
            }
        }

        $this->showDeleteModal = false;
        $this->positionToDelete = null;
    }

    public function toggleStatus($positionId)
    {
        $position = Position::find($positionId);
        if ($position) {
            $position->is_active = !$position->is_active;
            $position->save();
            session()->flash('success', 'Position status updated.');
        }
    }

    public function render()
    {
        $positions = Position::with(['department', 'employees'])
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->when($this->departmentFilter, function ($query) {
                $query->where('department_id', $this->departmentFilter);
            })
            ->orderBy('title')
            ->paginate(10);

        $departments = \App\Models\Department::orderBy('name')->get();

        return view('livewire.position-index', [
            'positions' => $positions,
            'departments' => $departments,
        ]);
    }
}
