<x-site-layout title='Edit Education'>

    <body class="bg-gray-100 text-gray-800 font-sans">
        <div class="container mx-auto mt-10">
            <h1 class="text-4xl font-bold mb-6">Edit Education</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('educations.update', $education->id) }}" method="POST" class="bg-yellow-50 shadow-md rounded px-8 pt-6 pb-8">
                @csrf
                @method('PUT')
                
                <!-- Institution Name -->
                <div class="mb-4">
                    <label for="institution_name" class="block text-gray-700 text-sm font-bold mb-2">Institution:</label>
                    <input type="text" id="institution_name" name="institution_name" value="{{ $education->institution_name }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                
                <!-- Programme -->
                <div class="mb-4">
                    <label for="programme" class="block text-gray-700 text-sm font-bold mb-2">Programme:</label>
                    <input type="text" id="programme" name="programme" value="{{ $education->programme }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                
                <!-- Start Date -->
                <div class="mb-4">
                    <label for="started_at" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                    <input type="date" id="started_at" name="started_at" value="{{ $education->started_at }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                
                <!-- Finish Date -->
                <div class="mb-4">
                    <label for="finished_at" class="block text-gray-700 text-sm font-bold mb-2">Finish Date:</label>
                    <input type="date" id="finished_at" name="finished_at" value="{{ $education->finished_at }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                
                <!-- Location -->
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" value="{{ $education->location }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                
                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" rows="4" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $education->description }}</textarea>
                </div>
                
                <!-- Grade -->
                <div class="mb-4">
                    <label for="grade" class="block text-gray-700 text-sm font-bold mb-2">Grade:</label>
                    <input type="text" id="grade" name="grade" value="{{ $education->grade }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>

                <!-- Skills -->
                <div class="mb-4">
                    <label for="skills" class="block text-gray-700 text-sm font-bold mb-2">Skills:</label>
                    <select id="skills" name="skills[]" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}" 
                                {{ in_array($skill->id, $education->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-2">Hold down the Ctrl (Windows) / Command (Mac) button to select multiple skills.</p>
                </div>
                
                @auth
                    <!-- Update Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                @endauth
            </form>
        </div>
    </body>
    

</x-site-layout>
