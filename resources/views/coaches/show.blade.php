@extends('layouts.admin_dashboard')
@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Coach Profile: {{ $coaches->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <div class="mb-6 md:mb-0">
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                                {{ $coaches->name }}
                            </h2>
                            <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $coaches->email }}</p>
                            <p class="text-gray-600"><span class="font-semibold">Phone:</span> {{ $coaches->phone }}</p>
                            <p class="text-gray-600"><span class="font-semibold">Age:</span> {{ $coaches->age }}</p>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <a href="{{ route('coaches.edit', $coaches->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Edit Profile
                            </a>
                            <form action="{{ route('coaches.destroy', $coaches->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this coach profile?');"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 w-full">
                                    Delete Profile
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Certification</h3>
                            <p class="text-gray-600">{{ $coaches->certifications }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Experience</h3>
                            <p class="text-gray-600">{{ $coaches->experience }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Training Approach</h3>
                        <p class="text-gray-600">{{ $coaches->training_approach }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                        <p class="text-gray-600">{{ $coaches->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
