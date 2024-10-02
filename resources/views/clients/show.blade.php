@extends('layouts.admin_dashboard')
@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                        <div class="flex-1 md:mr-6">
                            <h2 class="font-semibold text-2xl text-gray-800 mb-4">{{ $clients->name }}</h2>
                            <div class="text-black space-y-2">
                                <p><strong>Email:</strong> {{ $clients->email }}</p>
                                <p><strong>Phone:</strong> {{ $clients->phone }}</p>
                                <p><strong>Age:</strong> {{ $clients->age }}</p>
                                <p><strong>Weight:</strong> {{ $clients->weight }} kg</p>
                                <p><strong>Height:</strong> {{ $clients->height }} cm</p>
                                <p><strong>Activity Level:</strong> {{ $clients->activity_level }}</p>
                                <p><strong>Goal:</strong> {{ $clients->goal }}</p>
                            </div>
                        </div>

                        <div class="mt-4 md:mt-0 flex flex-col md:flex-row md:space-x-4">
                            <a href="{{ route('clients.edit', $clients->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('clients.destroy', $clients->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
