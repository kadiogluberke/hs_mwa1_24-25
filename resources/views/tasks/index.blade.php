<x-site-layout title='Tasks'>

    <x-succes-message/>

    {{-- @auth
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Work</a>
    @endauth --}}
        
    @foreach($tasks as $task)
        <a href="{{ route('tasks.show', $task->id) }}" class="block border-b border-gray-200 py-4">
                
            <!-- Institution Name -->
            <div class="text-lg font-bold mt-1">
                {{ $task->name }}
            </div>
    
            <!-- Description -->
            <div class="text-sm text-gray-600 mt-2">
                {{ Str::limit($task->description, 120, '...') }}
            </div>
    
    
            <!-- Skills -->
            <div class="mt-2">
                @foreach($task->skills as $skill)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                @endforeach
            </div>
        </a>
    @endforeach
        
</x-site-layout>


