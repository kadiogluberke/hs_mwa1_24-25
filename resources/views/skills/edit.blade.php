<x-site-layout title='Edit Skill'>
    <x-action-layout-edit title="Edit Skill" :action="route('skills.update', $skill->id)">

        <x-succes-message/>

        <!-- Skill Name -->
        <x-form-text name="name" label="Skill Name" :value="$skill->name" />

        <!-- Description -->
        <x-form-text-area 
            id="description" 
            name="description" 
            label="Description" 
            :value="$skill->description" 
            rows="4" 
        />

       
    </x-action-layout-edit>
</x-site-layout>

