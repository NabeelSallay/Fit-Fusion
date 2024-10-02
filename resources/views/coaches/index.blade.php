@extends('layouts.admin_dashboard')
@section('content')
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-black leading-tight">
            {{ __('Coaches') }}
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Certification</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Experience</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Training Approach</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($coaches as $coach)
                            <tr class="text-black">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->user_id }}</td>

                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->age }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->certifications }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->experience }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->training_approach }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $coach->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('coaches.show', $coach->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                    <a href="{{ route('coaches.edit', $coach->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                    <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="text-red-600 hover:text-red-900">Delete</button>
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
