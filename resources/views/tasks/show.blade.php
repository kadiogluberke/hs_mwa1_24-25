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
        <div class="flex space-x-4 mt-6 items-center">
            <!-- Back to List -->
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Back to List
            </a>
        </div>
        
    </body>

</x-site-layout>

