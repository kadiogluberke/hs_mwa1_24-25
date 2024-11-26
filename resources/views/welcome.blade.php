<x-site-layout title='Berke Kadıoğlu'>

    <section class="mb-8">
        <!--<h2 class="text-2xl font-semibold mb-4">About Me</h2>--->
        <p class="text-lg text-gray-700">
            {{ $user->about_me }}
        </p>
    </section>

    @if ($user->media->first() !== null)
        <img src="{{ $user->getFirstMediaUrl('profile_pictures') }}" alt="Profile Picture" class="w-32 h-32">
    @else
        <img src="{{asset('images/default.webp')}}"/>
    @endif


    <section>
        <h2 class="text-2xl font-semibold mb-4">Contact Information</h2>
        <ul class="list-disc pl-6 space-y-2">
            <li><strong>Phone:</strong> {{ $user->phone }}</li>
            <li><strong>Email:</strong> <a href="mailto:{{ $user->email }}" class="text-blue-500 underline">{{ $user->email }}</a></li>
            <li><strong>GitHub:</strong> <a href="{{ $user->github_link }}" target="_blank" class="text-blue-500 underline">{{ $user->github_link }}</a></li>
            <li><strong>LinkedIn:</strong> <a href="{{ $user->linkedin_link }}" target="_blank" class="text-blue-500 underline">{{ $user->linkedin_link }}</a></li>
            <li><strong>Resume:</strong> <a href="{{ $user->resume_link }}" target="_blank" class="text-blue-500 underline">View Resume</a></li>
        </ul>
    </section>

</x-site-layout>