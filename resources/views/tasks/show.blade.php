<x-site-layout title='Task Details'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        
        <!-- Institution Name -->
        <div class="text-3xl font-bold">
            {{ $task->name }} - {{ $task->work->institution_name }}, {{ $task->work->role }}
        </div>

        <!-- Description -->
        <div class="text-lg text-gray-600 mt-4">
            {{ $task->description }}
        </div>

        <!-- Skills -->
        <div class="mt-6">
            {{-- <div class="text-xl text-gray-700 font-semibold mb-2">Skills:</div> --}}
            @foreach($task->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-lg">{{$skill->name}}</span>
            @endforeach
        </div>

        <!-- Action Buttons -->
        <x-action-buttons type="tasks" :item="$task" />
        
    </body>

</x-site-layout>

