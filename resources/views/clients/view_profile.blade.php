@extends('layouts.client_profile')
@section('content')
    <div class="bg-transparent min-h-screen ">
        <main class="flex-grow">
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-7xl mx-auto">
                        <div class="md:flex">
                            <!-- Main Content Area -->
                            <main class="md:w-2/3 p-8">
                                <div class="max-w-3xl mx-auto">
                                    <h1 class="text-4xl font-extrabold text-white mb-8 pb-2 border-b-2 border-gray-300">Client Profile</h1>

                                    <div class="space-y-10">
                                        <section id="personal" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                            <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Personal Information
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <p><span class="font-medium text-gray-600">Full Name:</span> <span class="text-gray-800">{{ $client->name }}</span></p>
                                                <p><span class="font-medium text-gray-600">Email:</span> <span class="text-gray-800">{{ $client->email }}</span></p>
                                                <p><span class="font-medium text-gray-600">Phone:</span> <span class="text-gray-800">{{ $client->phone }}</span></p>
                                                <p><span class="font-medium text-gray-600">Age:</span> <span class="text-gray-800">{{ $client->age }} years</span></p>
                                            </div>
                                        </section>

                                        <section id="physical" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                            <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                Physical Information
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <p><span class="font-medium text-gray-600">Weight:</span> <span class="text-gray-800">{{ $client->weight }} kg</span></p>
                                                <p><span class="font-medium text-gray-600">Height:</span> <span class="text-gray-800">{{ $client->height }} m</span></p>
                                                <p><span class="font-medium text-gray-600">BMI:</span> <span class="text-gray-800">{{ number_format($client->weight / ($client->height * $client->height), 2) }}</span></p>
                                            </div>
                                        </section>

                                        <section id="fitness" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                            <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                                Fitness Information
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <p><span class="font-medium text-gray-600">Activity Level:</span> <span class="text-gray-800">{{ ucfirst(str_replace('_', ' ', $client->activity_level)) }}</span></p>
                                                <p><span class="font-medium text-gray-600">Fitness Goal:</span> <span class="text-gray-800">{{ ucfirst(str_replace('_', ' ', $client->goal)) }}</span></p>
                                            </div>
                                        </section>

                                        <section id="account" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                            <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                                </svg>
                                                Account Status
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <p><span class="font-medium text-gray-600">Status:</span>
                                                    @if($client->status)
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-200 text-green-800">Active</span>
                                                    @else
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-200 text-red-800">Inactive</span>
                                                    @endif
                                                </p>
                                                <p><span class="font-medium text-gray-600">Member Since:</span> <span class="text-gray-800">{{ $client->created_at->format('F d, Y') }}</span></p>
                                            </div>
                                        </section>
                                    </div>

                                    <div class="mt-10 flex justify-end">
                                        <a href="{{ route('clients.edit-profile', $client) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition duration-150 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                            Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
        </main>
    </div>
@endsection
