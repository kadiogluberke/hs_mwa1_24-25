<div class="mb-4">
    <label for="{{ $id }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}:</label>
    <select id="{{ $id }}" name="{{ $name }}" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
        @foreach ($skills as $skill)
            <option value="{{ $skill->id }}" 
                {{ in_array($skill->id, old(str_replace('[]', '', $name), $selectedSkills)) ? 'selected' : '' }}>
                {{ $skill->name }}
            </option>
        @endforeach
    </select>
    <p class="text-sm text-gray-500 mt-2">Hold down the Ctrl (Windows) / Command (Mac) button to select multiple skills.</p>
</div>
