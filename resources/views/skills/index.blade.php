<x-site-layout title='Skills'>

    <x-succes-message/>

    @auth
        <a href="{{ route('skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Skill</a>
    @endauth
        
    @foreach($skills as $skill)
        <a href="{{ route('skills.show', $skill->id) }}" class="block border-b border-gray-200 py-4">
            
            <!-- Skill Name -->
            <div class="text-lg font-bold mt-1">
                {{ $skill->name }}
            </div>
    
            <!-- Description -->
            <div class="text-sm text-gray-600 mt-2">
                {{ Str::limit($skill->description, 120, '...') }}
            </div>
    
            <!-- Related Educations -->
            <div class="mt-4">
                <div class="text-sm text-gray-700 font-semibold mb-1">Educations:</div>
                <ul class="list-disc pl-7 text-sm text-gray-600">
                    @foreach($skill->educations as $education)
                        <li>{{ $education->institution_name }} - {{ $education->programme }}</li>
                    @endforeach
                </ul>
            </div>
    
            <!-- Related Works -->
            <div class="mt-4">
                <div class="text-sm text-gray-700 font-semibold mb-1">Works:</div>
                <ul class="list-disc pl-7 text-sm text-gray-600">
                    @foreach($skill->works as $work)
                        <li>{{ $work->institution_name }} - {{ $work->role }}</li>
                    @endforeach
                </ul>
            </div>
    
            <!-- Related Tasks -->
            <div class="mt-4">
                <div class="text-sm text-gray-700 font-semibold mb-1">Tasks:</div>
                <ul class="list-disc pl-7 text-sm text-gray-600">
                    @foreach($skill->tasks as $task)
                        <li>{{ Str::limit($task->description, 120, '...') }}</li>
                    @endforeach
                </ul>
            </div>
    
            <!-- Related Projects -->
            <div class="mt-4">
                <div class="text-sm text-gray-700 font-semibold mb-1">Projects:</div>
                <ul class="list-disc pl-7 text-sm text-gray-600">
                    @foreach($skill->projects as $project)
                        <li>{{ $project->name }}</li>
                    @endforeach
                </ul>
            </div>
        </a>
    @endforeach
        
</x-site-layout>
