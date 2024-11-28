<x-site-layout title="New Task">
    <x-action-layout-create title="Create Task" :action="route('tasks.store')">

        <!-- Task Name -->
        <x-form-text name="name" label="Task Name" />

        <!-- Task Description -->
        <x-form-text-area 
            id="description" 
            name="description" 
            label="Task Description" 
            rows="4" 
        />

        <!-- Skills Select Box -->
        <x-skill-box 
            :skills="$skills" 
            :selectedSkills="old('skills', [])"
            label="Skills" 
            name="skills[]" 
            id="skills"
        />

        <!-- Work ID -->
        @if (isset($workId))
            <input type="hidden" name="work_id" value="{{ $workId }}">
            <p class="text-sm text-gray-600">Task will be associated with Work : {{ $work->institution_name }} - {{ $work->role }}</p>
        @else
            <x-form-select name="work_id" label="Associated Work" :options="$works->pluck('name', 'role')" />
        @endif

    </x-action-layout-create>
</x-site-layout>

