@extends('layouts.coach_dashboard')

@section('content')
    <h2 class="text-3xl font-bold mb-6 text-white">Connection Requests</h2>

    @if($connectionRequests->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 " role="alert">
            <p class="font-medium">You have no pending connection requests.</p>
        </div>
    @else
        <div class="space-y-6">
            @foreach($connectionRequests as $request)
                <div class="bg-white p-6  shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Request from {{ $request->client->name }}</h3>
                            <p class="text-sm text-gray-600 mt-1">Sent at: {{ $request->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <form action="{{ route('connections.accept', $request) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1">
                                    Accept
                                </button>
                            </form>
                            <form action="{{ route('connections.reject', $request) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </div>
                    @if($request->message)
                        <div class="mt-4 bg-gray-100 p-4 rounded-md">
                            <p class="text-gray-700"><span class="font-semibold">Message:</span> {{ $request->message }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection
