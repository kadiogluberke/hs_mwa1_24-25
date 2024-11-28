<x-site-layout title='Edit Task'>
    <x-action-layout-edit title="Edit Task" :action="route('tasks.update', $task->id)">

        <x-succes-message/>

        <!-- Institution Name -->
        <x-form-text name="name" label="Task Name" :value="$task->name" />

        <!-- Description -->
        <x-form-text-area 
            id="description" 
            name="description" 
            label="Task Description" 
            :value="$task->description" 
            rows="4" 
        />

        <!-- Skills -->
        <x-skill-box 
            :skills="$skills" 
            :selectedSkills="old('skills', $task->skills->pluck('id')->toArray())"
            label="Skills" 
            name="skills[]" 
            id="skills"
        />

        <!-- Work ID -->
        
        <input type="hidden" name="work_id" value="{{ $workId }}">
        <p class="text-sm text-gray-600">Task is associated with Work : {{ $work->institution_name }} - {{ $work->role }}</p>


    </x-action-layout-edit>
</x-site-layout>



