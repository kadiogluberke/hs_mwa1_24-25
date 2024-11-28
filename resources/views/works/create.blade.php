<x-site-layout title='New Work'>

    <x-action-layout-create title="Add New Work" :action="route('works.store')">

        <!-- Institution Field -->
        <x-form-text name="institution_name" label="Institution" />

        <!-- Role Field -->
        <x-form-text name="role" label="Role" />

        <!-- Start Date Field -->
        <x-form-text name="started_at" label="Start Date" type="date" />

        <!-- Finish Date Field -->
        <x-form-text name="finished_at" label="Finish Date" type="date"/>

        <!-- Location Field -->
        <x-form-text name="location" label="Location" />

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

        <!-- Single Task Section -->
        <div class="mb-6">
            <label for="task" class="block text-gray-700 text-sm font-bold mb-2">Task:</label>
            
            <!-- Task Name -->
            <x-form-text 
                id="task_name"
                name="task[name]" 
                label="Task Name" 
                placeholder="Enter task name (required)" 
            />

            <!-- Task Description -->
            <x-form-text-area 
                id="task_description"
                name="task[description]" 
                label="Task Description" 
                placeholder="Enter task description (optional)" 
                rows="2" 
            />
        </div>



    </x-action-layout-create>

</x-site-layout>
