<x-site-layout title='Educations'>

    <a href="{{ route('educations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Education</a>
        
    @foreach($educations as $education)
        
        <!-- Institution Name -->
        <div class="text-lg font-bold">
            {{ $education->institution_name }}
            <span class="line-end text-gray-500 text-sm">
                {{ $education->started_at }} - {{ $education->finished_at ?? 'Present' }}
            </span>
        </div>

        <!-- Programme and Grade -->
        <div class="text-sm text-gray-700 mt-1">
            {{ $education->programme }}
            <span class="line-end text-gray-500">
                <strong>Grade:</strong> {{ $education->grade }}
            </span>
        </div>

        <!-- Description -->
        <div class="text-sm text-gray-600 mt-2">
            {{ $education->description }}
        </div>

        <div>
            @foreach($education->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
            @endforeach
        </div>

    @endforeach
</x-site-layout>
