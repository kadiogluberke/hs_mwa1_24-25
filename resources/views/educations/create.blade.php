<x-site-layout title='New Education'>

    <body class="bg-stone-100 text-gray-800 font-sans">
        <div class="container mx-auto mt-10">
            <h1 class="text-4xl font-bold mb-6">Add New Education</h1>
            
            <x-error-message/>

            <form action="{{ route('educations.store') }}" method="POST" class="bg-yellow-50 shadow-md rounded px-8 pt-6 pb-8">
                @csrf
    
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
        
                @auth
                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button 
                            type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            Save
                        </button>
                    </div>
                @endauth
            </form>
        </div>
    </body>
    
</x-site-layout>

