<x-app-layout>
    <div class="bg-cover bg-center min-h-screen" style="background-image: url('/path-to-your-image.jpg');">
        <div class="bg-black bg-opacity-50 min-h-screen">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <!-- Back Button -->
                <div class="mb-6">
                    <button onclick="history.back()" class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-700 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 transition-transform duration-200 transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col md:flex-row gap-12">
                    <!-- Sidebar -->
                    <aside class="md:w-1/4 bg-gradient-to-b from-gray-900 to-gray-700 text-white p-6 rounded-lg shadow-lg">
                        <div class="sticky top-12">
                            <!-- Profile Section -->
                            <div class="text-center mb-10">
                                <div class="relative inline-block">
                                    <img class="h-40 w-40 rounded-full border-4 border-gray-600 shadow-lg" src="{{ auth()->user()->profilePhotoUrl }}" alt="Profile Picture">
                                    <div class="absolute bottom-2 right-2 bg-green-500 rounded-full p-2 border-2 border-white shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="mt-6 text-2xl font-semibold">{{ $client->name }}</h2>
                                <p class="text-gray-300">Client at Fit Fusion</p>
                            </div>

                            <!-- Navigation Menu -->
                            <nav class="space-y-4">
                                <a href="#personal" class="block py-3 px-5 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 transition ease-in-out duration-200">Personal Information</a>
                                <a href="#physical" class="block py-3 px-5 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 transition ease-in-out duration-200">Physical Information</a>
                                <a href="#fitness" class="block py-3 px-5 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 transition ease-in-out duration-200">Fitness Information</a>
                                <a href="#account" class="block py-3 px-5 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 transition ease-in-out duration-200">Account Status</a>
                            </nav>
                        </div>
                    </aside>

                    <!-- Main Content -->
                    <main class="w-full md:w-3/4">
                        <div class="bg-white shadow-lg rounded-lg p-10 bg-opacity-90">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
