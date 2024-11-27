<x-site-layout title='Education Details'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        
        <!-- <h1 class="text-4xl font-bold mb-6">Education Details</h1> -->
            <!-- Institution Name -->
        <div class="text-2xl font-bold">
            {{ $education->institution_name }}, {{ $education->location }}
            <span class="line-end text-gray-500 text-lg">
                {{ $education->started_at }} - {{ $education->finished_at ?? 'Present' }}
            </span>
        </div>

            <!-- Programme and Grade -->
        <div class="text-lg text-gray-700 mt-1">
            {{ $education->programme }}
            <span class="line-end text-gray-500" text-lg>
                <strong>Grade:</strong> {{ $education->grade }}
            </span>
        </div>

            <!-- Description -->
        <div class="text-lg text-gray-600 mt-2">
            {{ $education->description }}
        </div>

            <!-- Skills -->
        <div class="mt-4">
            @foreach($education->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-base">{{$skill->name}}</span>
            @endforeach
        </div>

            <!-- Action Buttons -->
        <x-action-buttons type="educations" :item="$education" />

    </body>

</x-site-layout>
