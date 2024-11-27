<body class="bg-stone-100 text-gray-800 font-sans">
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold mb-6">{{ $title }}</h1>
        
        <x-error-message />

        <form 
        action="{{ $action }}"
        method="POST" 
        class="bg-yellow-50 shadow-md rounded px-8 pt-6 pb-8">

            @csrf

            {{ $slot }}
    
            @auth
                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button 
                        type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Save
                    </button>
                </div>
            @endauth
        </form>
    </div>
</body>