<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}:</label>
    <input 
        type={{ $type }} 
        id="{{ $name }}" 
        name="{{ $name }}" 
        value="{{ old($name , $value) }}" 
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
        >
    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

{{-- <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        name="start_date" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                </div> --}}

