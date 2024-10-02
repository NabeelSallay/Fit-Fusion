<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Edit workout') }} {{ $workout->plan_name}}
        </h2>
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action = "{{ route('workout.update', $workout->id) }}"
                      method="POST" class="p-5">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="plan_name" class="block text-gray-700 text-sm font-bold mb-2">Plan Name</label>
                        <input type="text" name="plan_name" id="plan_name" value="{{ $workout->plan_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        @error('plan_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <input type="text" name="description" id="description" value="{{ $workout->description }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="goal" class="block text-gray-700 text-sm font-bold mb-2">Goal</label>
                        <input type="text" name="goal" id="goal" value="{{ $workout->goal }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('goal')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-700 text-sm font-bold mb-2">Duration</label>
                        <input type="text" name="duration" id="duration" value="{{ $workout->duration }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('duration')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="level" class="block text-gray-700 text-sm font-bold mb-2">Level</label>
                        <input type="text" name="level" id="level" value="{{ $workout->level }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('level')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
