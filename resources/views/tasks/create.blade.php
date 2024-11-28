<x-site-layout title='New Task'>

    <x-action-layout-create title="Add New Task" :action="route('tasks.store')">

        <!-- Name Field -->
        <x-form-text name="name" label="Name" />

        <!-- Description Field -->
        <x-form-text-area 
            id="description" 
            name="description" 
            label="Description" 
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

    </x-action-layout-create>

</x-site-layout>
