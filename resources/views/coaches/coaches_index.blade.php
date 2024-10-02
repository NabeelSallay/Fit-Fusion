@extends('layouts.coaches_index')
@section('content')

        <h1 class="text-3xl font-bold text-white mb-6">Our Coaches</h1>

        @if($coaches->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($coaches as $coach)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <img class="h-16 w-16 rounded-full mr-4" src="{{ auth()->user()->profile_photo_url }}" alt="{{ $coach->name }}">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800">{{ $coach->name }}</h2>
                                    <p class="text-sm text-gray-600">{{ $coach->training_approach }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($coach->description, 100) }}</p>
                            <div class="mb-4">
                                <span class="text-sm font-medium text-gray-500">Experience:</span>
                                <span class="text-sm text-gray-700">{{ $coach->experience }} years</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Age: {{ $coach->age }}</span>
                                <a href="{{ route('coaches.profile-coach-view', $coach->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                    View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $coaches->links() }}
            </div>
        @else
            <p class="text-gray-600">No coaches found matching your criteria.</p>
        @endif

@endsection
