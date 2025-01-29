<x-site-layout title='Skill Details'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        
        <!-- Skill Name -->
        <div class="text-3xl font-bold">
            {{ $skill->name }}
        </div>

        <!-- Description -->
        <div class="text-lg text-gray-600 mt-4">
            {{ $skill->description }}
        </div>

        <!-- Action Buttons -->
        <x-action-buttons type="skills" :item="$skill" />
        
    </body>

</x-site-layout>
