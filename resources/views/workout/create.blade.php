<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new workout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action = "{{ route('workout.store') }}"
                      method="POST" class="p-5">
                    @csrf
                    <div class="mb-4">
                        <label for="plan_name" class="block text-gray-700 text-sm font-bold mb-2">Plan Name</label>
                        <input type="text" name="plan_name" id="plan_name" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        @error('plan_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <input type="text" name="description" id="description" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="goal" class="block text-gray-700 text-sm font-bold mb-2">Goal</label>
                        <select name="goal" id="goal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select an option</option>
                            <option value="weight_loss" {{ old('goal') == 'weight_loss' ? 'selected' : '' }}>Weight Loss</option>
                            <option value="muscle_gain" {{ old('goal') == 'muscle_gain' ? 'selected' : '' }}>Muscle Gain</option>
                            <option value="maintenance" {{ old('goal') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="improve_endurance" {{ old('goal') == 'improve_endurance' ? 'selected' : '' }}>Improve Endurance</option>
                        </select>
                        @error('goal')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-700 text-sm font-bold mb-2">Duration</label>
                        <input type="text" name="duration" id="duration" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('duration')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="level" class="block text-gray-700 text-sm font-bold mb-2">Workout Level</label>
                        <select name="level" id="level" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select an option</option>
                            <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
