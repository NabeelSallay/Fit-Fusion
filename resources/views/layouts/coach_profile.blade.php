<x-app-layout>
    <div class="bg-transparent min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mb-4">
                <button onclick="history.back()" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-600 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar -->
                <aside class="md:w-1/3 bg-gradient-to-b from-blue-600 to-indigo-700 text-white p-6 rounded-lg shadow-lg">
                    <div class="sticky top-8">
                        <div class="text-center mb-8">
                            <div class="relative inline-block">
                                <img class="h-40 w-40 rounded-full border-4 border-white shadow-xl" src="{{ auth()->user()->profilePhotoUrl }}" alt="Profile Picture">
                                <div class="absolute bottom-0 right-0 bg-green-400 rounded-full p-1 border-2 border-white shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <h2 class="mt-4 text-3xl font-bold">{{ $coach->name }}</h2>
                            <p class="text-white">Coach at Fit Fusion</p>
                        </div>
                        <nav class="mt-8 space-y-4">
                            <a href="#personal" class="block py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 ease-in-out">Personal Information</a>
                            <a href="#professional" class="block py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 ease-in-out">Professional Information</a>
                            <a href="#approach" class="block py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 ease-in-out">Training Approach</a>
                            <a href="#description" class="block py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 ease-in-out">Description</a>
                            <a href="#account" class="block py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 ease-in-out">Account Status</a>


                        </nav>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="w-full md:w-3/4">
                    <div class="bg-transparent  rounded-lg p-8">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
