<div class="flex space-x-4 mt-6 items-center">
    <!-- Back to List -->
    <a href="{{ route($type . '.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Back to List
    </a>

    @auth
        <!-- Edit Button -->
        <a href="{{ route($type . '.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">
            Edit
        </a>

        <!-- Delete Button -->
        <form action="{{ route($type . '.destroy', $item->id) }}" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this {{ $type }}?');" 
              class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                Delete
            </button>
        </form>
    @endauth
</div>
