<div>
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $positionId ? 'Edit Position' : 'Create Position' }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $positionId ? 'Update position information' : 'Add a new job position to your organization' }}
                </p>
            </div>
            <div>
                <flux:button href="{{ route('positions.index') }}" variant="ghost" icon="arrow-left">
                    Back to Positions
                </flux:button>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <!-- Title -->
                <flux:input
                    wire:model="title"
                    label="Position Title"
                    placeholder="e.g., Senior Software Engineer"
                    required
                />
                @error('title')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Code -->
                <flux:input
                    wire:model="code"
                    label="Position Code"
                    placeholder="e.g., IT-SEN-DEV"
                    description="A unique code to identify this position"
                    required
                />
                @error('code')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Department -->
                <flux:select wire:model="department_id" label="Department" placeholder="Select department" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </flux:select>
                @error('department_id')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Level -->
                <flux:select wire:model="level" label="Position Level" required>
                    <option value="entry">Entry Level</option>
                    <option value="junior">Junior</option>
                    <option value="senior">Senior</option>
                    <option value="lead">Lead</option>
                    <option value="manager">Manager</option>
                    <option value="director">Director</option>
                </flux:select>
                @error('level')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Description -->
                <flux:textarea
                    wire:model="description"
                    label="Description"
                    placeholder="Describe the position's responsibilities and requirements..."
                    rows="4"
                />
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Salary Range -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <flux:input
                            wire:model="min_salary"
                            label="Minimum Salary (Rp)"
                            type="number"
                            placeholder="e.g., 5000000"
                            step="100000"
                        />
                        @error('min_salary')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <flux:input
                            wire:model="max_salary"
                            label="Maximum Salary (Rp)"
                            type="number"
                            placeholder="e.g., 10000000"
                            step="100000"
                        />
                        @error('max_salary')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Active Status -->
                <flux:checkbox wire:model="is_active" label="Active">
                    Position is active and available for hiring
                </flux:checkbox>
                @error('is_active')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <!-- Actions -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <flux:button href="{{ route('positions.index') }}" variant="ghost">
                        Cancel
                    </flux:button>
                    <flux:button type="submit" variant="primary">
                        {{ $positionId ? 'Update Position' : 'Create Position' }}
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</div>
