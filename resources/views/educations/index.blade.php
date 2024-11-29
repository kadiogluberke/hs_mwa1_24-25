<x-site-layout title='Educations'>

    <x-succes-message/>

    @auth
        <a href="{{ route('educations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Education</a>
    @endauth
        
    @foreach($educations as $education)
        <a href="{{ route('educations.show', $education->id) }}" class="block border-b border-gray-200 py-4">
            
            <!-- Institution Name -->
            <div class="text-lg font-bold mt-1">
                {{ $education->institution_name }}, {{ $education->location }}
                <span class="line-end text-gray-500 text-sm">
                    {{ $education->started_at }} - {{ $education->finished_at ?? 'Present' }}
                </span>
            </div>

            <!-- Programme and Grade -->
            <div class="text-sm text-gray-700 mt-2">
                {{ $education->programme }}
                @if($education->grade!=null)
                    <span class="line-end text-gray-500">
                        <strong>Grade:</strong> {{ $education->grade }}
                    </span>
                    
                @endif
                
            </div>

            <!-- Description -->
            <div class="text-sm text-gray-600 mt-3">
                {{ Str::limit($education->description, 120, '...') }}
            </div>

            <div class="mt-4">
                @foreach($education->skills as $skill)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                @endforeach
            </div>
        </a>

    @endforeach
</x-site-layout>
