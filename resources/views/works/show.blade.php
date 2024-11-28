<x-site-layout title='Work Details'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        
        <!-- Institution Name -->
        <div class="text-3xl font-bold">
            {{ $work->institution_name }}, {{ $work->location }}
            <span class="line-end text-gray-500 text-xl">
                {{ $work->started_at }} - {{ $work->finished_at ?? 'Present' }}
            </span>
        </div>

        <!-- Role -->
        <div class="text-2xl text-gray-800 mt-2 font-semibold">
            {{ $work->role }}
        </div>

        <!-- Description -->
        <div class="text-lg text-gray-600 mt-4">
            {{ $work->description }}
        </div>

        <!-- Tasks -->
        <div class="mt-6">
            {{-- <div class="text-xl text-gray-700 font-semibold mb-2">Tasks:</div> --}}
            <ul class="list-disc pl-8 text-lg text-gray-600">
                @foreach($work->tasks as $task)
                    <li>{{ $task->description }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Skills -->
        <div class="mt-6">
            {{-- <div class="text-xl text-gray-700 font-semibold mb-2">Skills:</div> --}}
            @foreach($work->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-lg">{{$skill->name}}</span>
            @endforeach
        </div>

        <!-- Action Buttons -->
        <x-action-buttons type="works" :item="$work" />
        
    </body>

</x-site-layout>
