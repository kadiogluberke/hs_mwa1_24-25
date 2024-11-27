<x-site-layout title='Edit Education'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        <div class="container mx-auto mt-10">
            <h1 class="text-4xl font-bold mb-6">Edit Education</h1>

            <x-error-message/>

            <form action="{{ route('educations.update', $education->id) }}" method="POST" class="bg-yellow-50 shadow-md rounded px-8 pt-6 pb-8">
                @csrf
                @method('PUT')
                
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
                    :selectedSkills="$education->skills->pluck('id')->toArray()" 
                    label="Skills" 
                    name="skills[]" 
                    id="skills"
                />
                
                @auth
                    <!-- Update Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                @endauth
            </form>
        </div>
    </body>
    

</x-site-layout>
