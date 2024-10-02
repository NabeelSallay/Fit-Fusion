<x-app-layout>
    <div class="bg-transparent min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-gray-800 shadow-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200" aria-label="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md rounded-lg">
                <div class="p-4">
                    <h1 class="text-2xl font-bold text-gray-800">Fit Fusion</h1>
                </div>
                <nav class="mt-4">
                    <a href="{{ route('admin') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 transition-colors">Dashboard</a>
                    <a href="{{ route('workout.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 transition-colors">Workout Plans</a>
                    <a href="{{ route('clients.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 transition-colors">Clients</a>
                    <a href="{{ route('coaches.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200 transition-colors">Coaches</a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div id="main-content" class="container mx-auto px-6 py-12 flex-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
