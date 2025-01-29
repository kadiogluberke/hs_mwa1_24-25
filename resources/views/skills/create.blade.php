<x-site-layout title='New Skill'>

    <x-action-layout-create title="Add New Skill" :action="route('skills.store')">

        <!-- Skill Name Field -->
        <x-form-text name="name" label="Skill Name" />

        <!-- Description Field -->
        <x-form-text-area 
            id="description" 
            name="description" 
            label="Description" 
            rows="4" 
        />

    </x-action-layout-create>

</x-site-layout>
