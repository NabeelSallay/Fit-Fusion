@extends('layouts.coach_profile')

@push('scripts')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

@section('content')
    <div class="bg-transparent min-h-screen">
        <main class="flex-grow">
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-7xl mx-auto">
                    <div class="md:flex">
                        <!-- Main Content Area -->
                        <main class="md:w-2/3 p-8" x-data="{ isModalOpen: false }">
                            <div class="max-w-3xl mx-auto flex justify-between items-center">
                                <h1 class="text-4xl font-extrabold text-white mb-8 pb-2 border-b-2 border-gray-300">Coach Profile</h1>

                                @if ($connection)
                                    @if ($connection->status === 'pending')
                                        <span class="text-yellow-500 font-bold">Pending...</span>
                                    @elseif ($connection->status === 'accepted')
                                        <span class="text-green-500 font-bold">Connected!</span>
                                    @else
                                        <button
                                            @click="isModalOpen = true"
                                            type="button"
                                            class="text-xl font-extrabold text-white bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded-lg transition duration-300"
                                            disabled>
                                            Connect
                                        </button>
                                    @endif
                                @else
                                    <button
                                        @click="isModalOpen = true"
                                        type="button"
                                        class="text-xl font-extrabold text-white bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded-lg transition duration-300">
                                        Connect
                                    </button>
                                @endif
                            </div>
                            <div class="space-y-10">
                                    <section id="personal" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                        <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Personal Information
                                        </h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <p><span class="font-medium text-gray-600">Full Name:</span> <span class="text-gray-800">{{ $coach->name ?? 'N/A' }}</span></p>
                                            <p><span class="font-medium text-gray-600">Email:</span> <span class="text-gray-800">{{ $coach->email ?? 'N/A' }}</span></p>
                                            <p><span class="font-medium text-gray-600">Phone:</span> <span class="text-gray-800">{{ $coach->phone ?? 'N/A' }}</span></p>
                                            <p><span class="font-medium text-gray-600">Age:</span> <span class="text-gray-800">{{ $coach->age ?? 'N/A' }}</span></p>                                        </div>
                                    </section>

                                    <section id="professional" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                        <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            Professional Information
                                        </h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <p><span class="font-medium text-gray-600">Certifications:</span> <span class="text-gray-800">{{ $coach->certifications }}</span></p>
                                            <p><span class="font-medium text-gray-600">Experience:</span> <span class="text-gray-800">{{ $coach->experience }} years</span></p>
                                        </div>
                                    </section>

                                    <section id="approach" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                        <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            Training Approach
                                        </h3>
                                        <div class="text-gray-800">
                                            <p>{{ $coach->training_approach }}</p>
                                        </div>
                                    </section>

                                    <section id="description" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                        <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            About Me
                                        </h3>
                                        <div class="text-gray-800">
                                            <p>{{ $coach->description }}</p>
                                        </div>
                                    </section>

                                    <section id="account" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                                        <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                            </svg>
                                            Account Status
                                        </h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <p><span class="font-medium text-gray-600">Status:</span>
                                                @if($coach->status)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-200 text-green-800">Active</span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-200 text-red-800">Inactive</span>
                                                @endif
                                            </p>
                                            <p><span class="font-medium text-gray-600">Member Since:</span> <span class="text-gray-800">{{ $coach->created_at->format('F d, Y') }}</span></p>
                                        </div>
                                    </section>
                                </div>



                            <!-- Connection Modal -->
                            <div
                                x-show="isModalOpen"
                                @keydown.escape.window="isModalOpen = false"
                                class="fixed inset-0 z-50 overflow-y-auto"
                                style="display: none;">
                                <div class="flex items-center justify-center min-h-screen px-4">
                                    <div class="fixed inset-0 bg-black opacity-30" @click="isModalOpen = false"></div>

                                    <div class="relative bg-white rounded-lg max-w-md w-full p-6">
                                        <div class="absolute top-4 right-4">
                                            <button @click="isModalOpen = false" class="text-gray-400 hover:text-gray-500">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <h2 class="text-2xl text-black font-bold mb-4">Connect with {{ $coach->name }}</h2>

                                        <form action="{{ route('connections.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="coach_id" value="{{ $coach->id }}">

                                            <div class="mb-4">
                                                <label for="message" class="block text-gray-700 font-medium mb-2">Message (Optional)</label>
                                                <textarea
                                                    id="message"
                                                    name="message"
                                                    rows="4"
                                                    class="w-full px-3 text-black py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    placeholder="Introduce yourself and explain why you'd like to connect..."></textarea>
                                            </div>

                                            <div class="flex justify-end space-x-3">
                                                <button
                                                    type="button"
                                                    @click="isModalOpen = false"
                                                    class="px-4 py-2 text-gray-600 hover:text-gray-700 font-medium">
                                                    Cancel
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium transition duration-300">
                                                    Send Request
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
