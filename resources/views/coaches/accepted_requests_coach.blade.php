@extends('layouts.coach_dashboard')
@section('content')
        <div class="bg-transparent min-h-screen">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="mb-4">
                    <h1 class="text-3xl font-bold">Accepted Connection Requests</h1>
                </div>

                <div class="bg-white  shadow-lg p-6 text-black">
                    <h2 class="text-xl text-black font-semibold mb-4">Your Accepted Connections</h2>

                    @if ($connections->isEmpty())
                        <p class="text-gray-500">You have not accepted any connection requests.</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4 text-left">Client</th>
                                <th class="py-2 px-4 text-left">Message</th>
                                <th class="py-2 px-4 text-left">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($connections as $connection)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $connection->client->name }}</td>
                                    <td class="py-2 px-4">{{ $connection->message ?? 'No message' }}</td>
                                    <td class="py-2 px-4">
{{--                                        <a href="{{ route('chat.start', $connection) }}" class="text-blue-500 hover:underline">--}}
{{--                                            Chat--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
@endsection
