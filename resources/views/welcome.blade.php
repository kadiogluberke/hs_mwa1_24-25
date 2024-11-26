<x-site-layout title='Berke Kadıoğlu'>

    <section class="mb-8 flex flex-col md:flex-row items-center md:items-start md:space-x-8">
        <!-- Profile Picture -->
        <div class="flex-shrink-0">
            @if ($user->media->first() !== null)
                <img src="{{ $user->getFirstMediaUrl('profile_pictures', 'thumb') }}" alt="Profile Picture" class="w-40 h-40 rounded-full object-cover shadow-lg">
            @else
                <img src="{{ asset('images/default.webp') }}" alt="Default Profile Picture" class="w-40 h-40 rounded-full object-cover shadow-lg">
            @endif
        </div>
    
        <!-- About Me -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">About Me</h2>
            <p class="text-lg text-gray-700">
                {{ $user->about_me }}
            </p>
        </div>
    </section>
    
    <!-- Contact Information -->
    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Contact Information</h2>
        <ul class="list-disc pl-6 space-y-2 text-lg">
            <li><strong>Phone:</strong> {{ $user->phone }}</li>
            <li><strong>Email:</strong> <a href="mailto:{{ $user->email }}" class="text-blue-500 underline">{{ $user->email }}</a></li>
            <li><strong>GitHub:</strong> <a href="{{ $user->github_link }}" target="_blank" class="text-blue-500 underline">{{ $user->github_link }}</a></li>
            <li><strong>LinkedIn:</strong> <a href="{{ $user->linkedin_link }}" target="_blank" class="text-blue-500 underline">{{ $user->linkedin_link }}</a></li>
            <li><strong>Resume:</strong> <a href="{{ $user->resume_link }}" target="_blank" class="text-blue-500 underline">View Resume</a></li>
        </ul>
    </section>
    

</x-site-layout>