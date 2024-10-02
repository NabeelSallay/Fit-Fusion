@extends('layouts.coach_profile')
@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Coach Profile:') }} {{ $coach->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-opacity-90 shadow-lg rounded-lg p-8">
                <form action="{{ route('coaches.update', $coach->id) }}" method="POST" class="space-y-6">
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
                                <input type="text" name="name" id="name" value="{{ old('name', $coach->name) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $coach->email) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $coach->phone) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('phone')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                                <input type="number" name="age" id="age" value="{{ old('age', $coach->age) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('age')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </section>

                    <!-- Professional Information -->
                    <section>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Professional Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="certifications" class="block text-gray-700 text-sm font-bold mb-2">Certifications</label>
                                <input type="text" name="certifications" id="certifications" value="{{ old('certifications', $coach->certifications) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('certifications')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">Experience (years)</label>
                                <input type="number" name="experience" id="experience" value="{{ old('experience', $coach->experience) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('experience')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </section>

                    <!-- Training Approach -->
                    <section>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Training Approach</h2>
                        <div>
                            <label for="training_approach" class="block text-gray-700 text-sm font-bold mb-2">Training Approach</label>
                            <textarea name="training_approach" id="training_approach" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('training_approach', $coach->training_approach) }}</textarea>
                            @error('training_approach')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>

                    <!-- About Me -->
                    <section>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">About Me</h2>
                        <div>
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea name="description" id="description" rows="6" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $coach->description) }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
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
