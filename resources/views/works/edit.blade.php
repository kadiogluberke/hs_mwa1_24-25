<x-site-layout title='Edit Work'>
    <x-action-layout-edit title="Edit Work" :action="route('works.update', $work->id)">

        <x-succes-message/>

        <!-- Institution Name -->
        <x-form-text name="institution_name" label="Institution" :value="$work->institution_name" />

        <!-- Role -->
        <x-form-text name="role" label="Role" :value="$work->role" />

        <!-- Start Date -->
        <x-form-text name="started_at" label="Start Date" type='date' :value="$work->started_at" />

        <!-- Finish Date -->
        <x-form-text name="finished_at" label="Finish Date" type='date' :value="$work->finished_at" />

        <!-- Location -->
        <x-form-text name="location" label="Location" :value="$work->location" />

        <!-- Description -->
        <x-form-text-area 
            id="description" 
            name="description" 
            label="Description" 
            :value="$work->description" 
            rows="4" 
        />

        <!-- Skills -->
        <x-skill-box 
            :skills="$skills" 
            :selectedSkills="old('skills', $work->skills->pluck('id')->toArray())"
            label="Skills" 
            name="skills[]" 
            id="skills"
        />

        <!-- Tasks Section -->
        <div id="tasks-section" class="mt-3">
            <h3 class="text-lg font-semibold mb-2">Tasks</h3>
            <div class="space-y-2">
                @forelse ($work->tasks as $task)
                    <div class="p-4 border rounded-md bg-gray-50 flex justify-between items-center">
                        <!-- Task Details -->
                        <div>
                            <!-- Task Name -->
                            <h4 class="text-md font-medium text-gray-800">{{ $task->name }}</h4>
                            <!-- Task Description -->
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                        </div>
                        
                        <!-- Edit Task Button -->
                        @auth
                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                class="bg-blue-500 text-white text-sm px-3 py-1 rounded">
                                Edit Task
                            </a>
                        @endauth
                    </div>
                @empty
                    <p class="text-gray-500">No tasks assigned to this work.</p>
                @endforelse
            </div>
        </div>
        
        

        @auth
            <div class="flex items-center justify-between mt-3">
                <a href="{{ route('tasks.create', ['work_id' => $work->id]) }}" 
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                    Add Task
                </a>
            </div>
         @endauth

    </x-action-layout-edit>
</x-site-layout>


