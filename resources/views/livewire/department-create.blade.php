<div>
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $departmentId ? 'Edit Department' : 'Create Department' }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $departmentId ? 'Update department information' : 'Add a new department to your organization' }}
                </p>
            </div>
            <div>
                <flux:button href="{{ route('departments.index') }}" variant="ghost" icon="arrow-left">
                    Back to Departments
                </flux:button>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <!-- Name -->
                <flux:input
                    wire:model="name"
                    label="Department Name"
                    placeholder="e.g., Human Resources"
                    required
                />
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Code -->
                <flux:input
                    wire:model="code"
                    label="Department Code"
                    placeholder="e.g., HR"
                    description="A unique code to identify this department"
                    required
                />
                @error('code')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Description -->
                <flux:textarea
                    wire:model="description"
                    label="Description"
                    placeholder="Describe the department's purpose and responsibilities..."
                    rows="4"
                />
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Manager -->
                <flux:select wire:model="manager_id" label="Department Manager" placeholder="Select a manager">
                    <option value="">No manager assigned</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </flux:select>
                @error('manager_id')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Active Status -->
                <flux:checkbox wire:model="is_active" label="Active">
                    Department is active and operational
                </flux:checkbox>
                @error('is_active')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Actions -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <flux:button href="{{ route('departments.index') }}" variant="ghost">
                        Cancel
                    </flux:button>
                    <flux:button type="submit" variant="primary">
                        {{ $departmentId ? 'Update Department' : 'Create Department' }}
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</div>