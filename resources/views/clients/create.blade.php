<x-app-layout>
    <div class="py-20 bg-transparent">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <button onclick="history.back()" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-600 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
            </div>
            <div class="bg-transparent bg-opacity-80 shadow-lg sm:rounded-lg p-8">
                <h2 class="text-4xl font-bold text-white mb-8">Create Client Profile</h2>
                <form action="{{ route('clients.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="true">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label for="name" class="block text-gray-100 text-lg font-semibold mb-3">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" placeholder="John Doe">
                            @error('name')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-gray-100 text-lg font-semibold mb-3">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" placeholder="john@example.com">
                            @error('email')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-100 text-lg font-semibold mb-3">Phone Number</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" placeholder="(123) 456-7890">
                            @error('phone')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="age" class="block text-gray-100 text-lg font-semibold mb-3">Age</label>
                            <input type="number" name="age" id="age" value="{{ old('age') }}" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" placeholder="25">
                            @error('age')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="weight" class="block text-gray-100 text-lg font-semibold mb-3">Weight (kg)</label>
                            <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" placeholder="70.5">
                            @error('weight')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="height" class="block text-gray-100 text-lg font-semibold mb-3">Height (m)</label>
                            <input type="number" step="0.01" name="height" id="height" value="{{ old('height') }}" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white" placeholder="1.75">
                            @error('height')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="activity_level" class="block text-gray-100 text-lg font-semibold mb-3">Activity Level</label>
                            <select name="activity_level" id="activity_level" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
                                <option value="">Select your activity level</option>
                                <option value="Sedentary" {{ old('activity_level') == 'sedentary' ? 'selected' : '' }}>Sedentary</option>
                                <option value="Lightly active" {{ old('activity_level') == 'lightly active' ? 'selected' : '' }}>Lightly Active</option>
                                <option value="Moderately active" {{ old('activity_level') == 'moderately active' ? 'selected' : '' }}>Moderately Active</option>
                                <option value="Very active" {{ old('activity_level') == 'very active' ? 'selected' : '' }}>Very Active</option>
                            </select>
                            @error('activity_level')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="goal" class="block text-gray-100 text-lg font-semibold mb-3">Fitness Goal</label>
                            <select name="goal" id="goal" class="w-full px-4 py-3 text-lg border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
                                <option value="">Select your goal</option>
                                <option value="Weight loss" {{ old('goal') == 'weight loss' ? 'selected' : '' }}>Weight Loss</option>
                                <option value="Muscle gain" {{ old('goal') == 'muscle gain' ? 'selected' : '' }}>Muscle Gain</option>
                                <option value="Maintenance" {{ old('goal') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                <option value="Improve endurance" {{ old('goal') == 'improve endurance' ? 'selected' : '' }}>Improve Endurance</option>
                            </select>
                            @error('goal')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xl font-bold py-4 rounded-md transition duration-300 ease-in-out">
                            Create Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
