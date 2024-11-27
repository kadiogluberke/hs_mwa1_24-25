<div class="mb-4">
    <label for="{{ $id }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}:</label>
    <textarea 
        id="{{ $id }}" 
        name="{{ $name }}" 
        rows="{{ $rows }}" 
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>



