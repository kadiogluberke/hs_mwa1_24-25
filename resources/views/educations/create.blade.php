<x-site-layout title='New Education'>

    <body class="bg-stone-100 text-gray-800 font-sans">
        <div class="container mx-auto mt-10">
            <h1 class="text-4xl font-bold mb-6">Add New Education</h1>
            <form action="{{ route('educations.store') }}" method="POST" class="bg-yellow-50 shadow-md rounded px-8 pt-6 pb-8">
                @csrf
    
                <!-- Institution Field -->
                <div class="mb-4">
                    <label for="institution" class="block text-gray-700 text-sm font-bold mb-2">Institution:</label>
                    <input 
                        type="text" 
                        id="institution" 
                        name="institution" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div>
    
                <!-- Program Field -->
                <div class="mb-4">
                    <label for="degree" class="block text-gray-700 text-sm font-bold mb-2">Program:</label>
                    <input 
                        type="text" 
                        id="degree" 
                        name="degree" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div>
    
                <!-- Start Date Field -->
                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        name="start_date" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div>
    
                <!-- Finish Date Field -->
                <div class="mb-4">
                    <label for="finish_date" class="block text-gray-700 text-sm font-bold mb-2">Finish Date:</label>
                    <input 
                        type="date" 
                        id="finish_date" 
                        name="finish_date" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div>
    
                <!-- Location Field -->
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input 
                        type="text" 
                        id="location" 
                        name="location" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div>
    
                <!-- Description Field -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="3" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    ></textarea>
                </div>
    
                <!-- Grade Field -->
                <div class="mb-4">
                    <label for="grade" class="block text-gray-700 text-sm font-bold mb-2">Grade:</label>
                    <input 
                        type="text" 
                        id="grade" 
                        name="grade" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div>

                <!-- Skills Select Box -->
                <div class="mb-4">
                    <label for="skills" class="block text-gray-700 text-sm font-bold mb-2">Skills:</label>
                    <select 
                        id="skills" 
                        name="skills[]" 
                        multiple 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-2">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple skills.</p>
                </div>
        
                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button 
                        type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </body>
    
</x-site-layout>

