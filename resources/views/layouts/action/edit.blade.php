<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold mb-6">{{ $title }}</h1>

        <x-error-message/>

        <form 
        action="{{ $action }}"  
        method="POST" 
        class="bg-yellow-50 shadow-md rounded px-8 pt-6 pb-8">

            @csrf
            @method('PUT')
            
            {{ $slot }}
            
            @auth
                <!-- Update Button -->
                <div class="flex items-center justify-between mt-3">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                </div>
            @endauth
        </form>
    </div>
</body>