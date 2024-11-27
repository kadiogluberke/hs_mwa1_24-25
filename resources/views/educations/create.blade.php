<x-site-layout title='New Education'>

    <x-action-layout-create title="Add New Education" :action="route('educations.store')">

                <!-- Institution Field -->
                <x-form-text name="institution_name" label="Institution" />
    
                <!-- Program Field -->
                <x-form-text name="programme" label="Program" />
    
                <!-- Start Date Field -->
                <x-form-text name="start_date" label="Start Date" type="date" />
    
                <!-- Finish Date Field -->
                <x-form-text name="finish_date" label="Finish Date" type="date"/>
    
                <!-- Location Field -->
                <x-form-text name="location" label="Location" />
    
                <!-- Description Field -->
                <x-form-text-area 
                    id="description" 
                    name="description" 
                    label="Description" 
                    rows="4" 
                />
    
                <!-- Grade Field -->
                <x-form-text name="grade" label="Grade" />

                <!-- Skills Select Box -->
                <x-skill-box 
                    :skills="$skills" 
                    :selectedSkills="[]" 
                    label="Skills" 
                    name="skills[]" 
                    id="skills"
                />
        
    </x-action-layout-create>

</x-site-layout>

