<x-site-layout title='Works'>

    <x-succes-message/>

    @auth
        <a href="{{ route('works.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Work</a>
    @endauth
        
    @foreach($works as $work)
        <a href="{{ route('works.show', $work->id) }}" class="block border-b border-gray-200 py-4">
                
            <!-- Institution Name -->
            <div class="text-lg font-bold mt-1">
                {{ $work->institution_name }}, {{ $work->location }}
                <span class="line-end text-gray-500 text-sm">
                    {{ $work->started_at }} - {{ $work->finished_at ?? 'Present' }}
                </span>
            </div>
    
            <!-- Role -->
            <div class="text-base text-gray-800 mt-2 font-medium">
                {{ $work->role }}
            </div>
    
            <!-- Description -->
            <div class="text-sm text-gray-600 mt-2">
                {{ Str::limit($work->description, 220, '...') }}
            </div>
    
            <!-- Tasks -->
            <div class="mt-4">
                {{-- <div class="text-sm text-gray-700 font-semibold mb-1">Tasks:</div> --}}
                <ul class="list-disc pl-7 text-sm text-gray-600">
                    @foreach($work->tasks as $task)
                        <li>{{ Str::limit($task->description, 20, '...') }}</li>
                    @endforeach
                </ul>
            </div>
    
            <!-- Skills -->
            <div class="mt-2">
                @foreach($work->skills as $skill)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                @endforeach
            </div>
        </a>
    @endforeach
        
</x-site-layout>

