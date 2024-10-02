@extends('layouts.client_profile')
@section('content')

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Client Profile:') }} {{ $client->name }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-90 shadow-lg rounded-lg p-8">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="status" value="true">

                        <!-- Personal Information -->
                        <section>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Personal Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('phone')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                                    <input type="number" name="age" id="age" value="{{ old('age', $client->age) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('age')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </section>

                        <!-- Physical Information -->
                        <section>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Physical Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">Weight (kg)</label>
                                    <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight', $client->weight) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('weight')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="height" class="block text-gray-700 text-sm font-bold mb-2">Height (m)</label>
                                    <input type="number" step="0.01" name="height" id="height" value="{{ old('height', $client->height) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('height')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </section>

                        <!-- Fitness Information -->
                        <section>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Fitness Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="activity_level" class="block text-gray-700 text-sm font-bold mb-2">Activity Level</label>
                                    <select name="activity_level" id="activity_level" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="">Select an option</option>
                                        <option value="sedentary" {{ old('activity_level', $client->activity_level) == 'sedentary' ? 'selected' : '' }}>Sedentary</option>
                                        <option value="lightly_active" {{ old('activity_level', $client->activity_level) == 'lightly_active' ? 'selected' : '' }}>Lightly Active</option>
                                        <option value="moderately_active" {{ old('activity_level', $client->activity_level) == 'moderately_active' ? 'selected' : '' }}>Moderately Active</option>
                                        <option value="very_active" {{ old('activity_level', $client->activity_level) == 'very_active' ? 'selected' : '' }}>Very Active</option>
                                        <option value="super_active" {{ old('activity_level', $client->activity_level) == 'super_active' ? 'selected' : '' }}>Super Active</option>
                                    </select>
                                    @error('activity_level')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="goal" class="block text-gray-700 text-sm font-bold mb-2">Goal</label>
                                    <select name="goal" id="goal" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="">Select an option</option>
                                        <option value="lose_weight" {{ old('goal', $client->goal) == 'lose_weight' ? 'selected' : '' }}>Lose Weight</option>
                                        <option value="gain_weight" {{ old('goal', $client->goal) == 'gain_weight' ? 'selected' : '' }}>Gain Weight</option>
                                        <option value="maintain_weight" {{ old('goal', $client->goal) == 'maintain_weight' ? 'selected' : '' }}>Maintain Weight</option>
                                    </select>
                                    @error('goal')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </section>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
