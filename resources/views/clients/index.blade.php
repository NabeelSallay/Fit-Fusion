@extends('layouts.admin_dashboard')
@section('content')
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">User ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Age</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Weight</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Height</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Activity Level</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Goal</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($clients as $client)
                            <tr class="text-black">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->user_id }}</td>

                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->age }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->weight }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->height }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->activity_level }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $client->goal }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('clients.show', $client->id) }}" class="text-green-600 hover:text-green-900 mr-2">View</a>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this client?');" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
