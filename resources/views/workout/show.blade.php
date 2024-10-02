<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ $workout->plan_name }}
        </h2>
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items center">
                        <div class="flex-1 text-2xl">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ $workout->plan_name }}
                            </h2>
                            <p class="text-gray-500">{{ $workout->description }}</p>
                            <p class="text-gray-500">{{ $workout->goal }}</p>
                            <p class="text-gray-500">{{ $workout->duration }}</p>
                            <p class="text-gray-500">{{ $workout->level }}</p>
                        </div>
                        <div class="flex-1 text-2xl">
                            <a href="{{ route('workout.edit', $workout->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        </div>
                        <div class="flex-1 text-2xl">
                            <form action="{{ route('workout.destroy', $workout->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
