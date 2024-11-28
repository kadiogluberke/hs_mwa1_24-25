<x-site-layout title='Education Details'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        
        <!-- <h1 class="text-4xl font-bold mb-6">Education Details</h1> -->
            <!-- Institution Name -->
        <div class="text-3xl font-bold">
            {{ $education->institution_name }}, {{ $education->location }}
            <span class="line-end text-gray-500 text-xl">
                {{ $education->started_at }} - {{ $education->finished_at ?? 'Present' }}
            </span>
        </div>

            <!-- Programme and Grade -->
        <div class="text-2xl text-gray-800 mt-2 font-semibold">
            {{ $education->programme }}
            <span class="line-end text-gray-500 text-lg">
                <strong>Grade:</strong> {{ $education->grade }}
            </span>
        </div>

            <!-- Description -->
        <div class="text-lg text-gray-600 mt-4">
            {{ $education->description }}
        </div>

            <!-- Skills -->
        <div class="mt-6">
            @foreach($education->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-lg">{{$skill->name}}</span>
            @endforeach
        </div>

            <!-- Action Buttons -->
        <x-action-buttons type="educations" :item="$education" />

    </body>

</x-site-layout>
