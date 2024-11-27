<x-site-layout title='Edit Education'>
    <x-action-layout-edit title="Edit Education" :action="route('educations.update', $education->id)">

                <!-- Institution Name -->
                <x-form-text name="institution_name" label="Institution" value="{{ $education->institution_name }}" />
                
                <!-- Programme -->
                <x-form-text name="programme" label="Programme" value="{{ $education->programme }}" />
                
                <!-- Start Date -->
                <x-form-text name="started_at" label="Start Date" type='date' value="{{ $education->started_at }}" />
                
                <!-- Finish Date -->
                <x-form-text name="finished_at" label="Finish Date" type='date' value="{{ $education->finished_at }}" />
                
                <!-- Location -->
                <x-form-text name="location" label="Location " value="{{ $education->location }}" />
                
                <!-- Description -->
                <x-form-text-area 
                    id="description" 
                    name="description" 
                    label="Description" 
                    :value="$education->description" 
                    rows="4" 
                />
                
                <!-- Grade -->
                <x-form-text name="grade" label="Grade " value="{{ $education->grade }}" />

                <!-- Skills -->
                <x-skill-box 
                    :skills="$skills" 
                    :selectedSkills="old('skills', $education->skills->pluck('id')->toArray())"
                    label="Skills" 
                    name="skills[]" 
                    id="skills"
                />
    
    </x-action-layout-edit>

</x-site-layout>
