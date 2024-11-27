@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 001.415-1.415L11.415 10l4.348-4.349a1 1 0 10-1.415-1.415L10 8.586 5.651 4.237a1 1 0 00-1.415 1.415L8.586 10l-4.35 4.349a1 1 0 001.415 1.415L10 11.415l4.349 4.348z"/></svg>
        </button>
    </div>
@endif