@extends('layouts.clients_index')
@section('content')

    <h1 class="text-3xl font-bold text-white mb-6">Our Clients</h1>

    @if($clients->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clients as $client)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img class="h-16 w-16 rounded-full mr-4" src="{{ $client->user->profile_photo_url }}" alt="{{ $client->name }}">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">{{ $client->name }}</h2>
                                <p class="text-sm text-gray-600">{{ $client->goal }}</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <span class="text-sm font-medium text-gray-500">Age:</span>
                            <span class="text-sm text-gray-700">{{ $client->age }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-sm font-medium text-gray-500">Activity Level:</span>
                            <span class="text-sm text-gray-700">{{ $client->activity_level }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Status: {{ $client->status ? 'Active' : 'Inactive' }}</span>
                            <a href="{{ route('clients.profile-client-view', $client->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $clients->links() }}
        </div>
    @else
        <p class="text-gray-600">No clients found.</p>
    @endif

@endsection
