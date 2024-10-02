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
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <aside class="lg:w-1/4">
                    <div class="sticky top-8 bg-gradient-to-br from-green-600 to-teal-700 text-white p-6 shadow-xl">
                        <h2 class="text-2xl font-bold mb-6">Client Dashboard</h2>
                        <nav class="space-y-4">
                            <a href="{{ route('client.dashboard') }}" class="block py-2 px-4 rounded hover:bg-white hover:bg-opacity-20 transition duration-200">Manage Sent Requests</a>
                            <a href="{{ route('client.accepted_requests') }}" class="block py-2 px-4 rounded hover:bg-white hover:bg-opacity-20 transition duration-200">Accepted requests</a>
{{--                            <a href="#" class="block py-2 px-4 rounded hover:bg-white hover:bg-opacity-20 transition duration-200">Schedule Sessions</a>--}}
                        </nav>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="w-full lg:w-3/4">
                    <div class="bg-transparent shadow-xl p-8">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clearFiltersButton = document.getElementById('clearFilters');
            if (clearFiltersButton) {
                clearFiltersButton.addEventListener('click', function() {
                    const form = document.getElementById('filterForm');
                    const inputs = form.querySelectorAll('input:not([type="submit"]), select');
                    inputs.forEach(input => {
                        if (input.tagName.toLowerCase() === 'input') {
                            input.value = '';
                        } else if (input.tagName.toLowerCase() === 'select') {
                            input.selectedIndex = 0;
                        }
                    });
                    form.submit();
                });
            }
        });
    </script>
</x-app-layout>
