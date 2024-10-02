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
                <aside class="md:w-1/4 bg-gradient-to-b from-green-600 to-teal-700 text-white p-6 rounded-lg shadow-lg">
                    <div class="sticky top-8">
                        <h2 class="text-2xl font-bold mb-6">Find Clients</h2>

                        <!-- Search form -->
                        <form action="{{ route('clients.search') }}" method="GET" class="mb-6">
                            <div class="flex">
                                <input type="text" name="search" placeholder="Search clients..." class="w-full px-4 py-2 rounded-l-lg text-gray-700" value="{{ request('search') }}">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-r-lg hover:bg-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <!-- Filters -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Filters</h3>
                            <form action="{{ route('clients.search') }}" method="GET" id="filterForm">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Goals (comma-separated)</label>
                                        <input type="text" name="goal" class="w-full px-3 py-2 rounded-lg text-gray-700" value="{{ request('goal') }}">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Activity Level</label>
                                        <select name="activity_level" class="w-full px-3 py-2 rounded-lg text-gray-700">
                                            <option value="">All Levels</option>
                                            <option value="sedentary" {{ request('activity_level') == 'sedentary' ? 'selected' : '' }}>Sedentary</option>
                                            <option value="lightly_active" {{ request('activity_level') == 'lightly_active' ? 'selected' : '' }}>Lightly Active</option>
                                            <option value="moderately_active" {{ request('activity_level') == 'moderately_active' ? 'selected' : '' }}>Moderately Active</option>
                                            <option value="very_active" {{ request('activity_level') == 'very_active' ? 'selected' : '' }}>Very Active</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Age Range</label>
                                        <div class="flex space-x-2">
                                            <input type="number" name="age_min" placeholder="Min" class="w-1/2 px-3 py-2 rounded-lg text-gray-700" value="{{ request('age_min') }}">
                                            <input type="number" name="age_max" placeholder="Max" class="w-1/2 px-3 py-2 rounded-lg text-gray-700" value="{{ request('age_max') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-100 transition duration-200">
                                        Apply Filters
                                    </button>
                                    <button type="button" id="clearFilters" class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200">
                                        Clear Filters
                                    </button>
                                </div>
                            </form>
                        </div>

                        <nav class="mt-8 space-y-4">
                            <a href="{{ route('clients.client-index') }}" class="block py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 ease-in-out">All Clients</a>
                        </nav>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="w-full md:w-3/4">
                    <div class="bg-transparent rounded-lg p-8">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('clearFilters').addEventListener('click', function() {
            var form = document.getElementById('filterForm');
            var inputs = form.getElementsByTagName('input');
            var selects = form.getElementsByTagName('select');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type !== 'submit') {
                    inputs[i].value = '';
                }
            }
            for (var i = 0; i < selects.length; i++) {
                selects[i].selectedIndex = 0;
            }
            form.submit();
        });
    </script>
</x-app-layout>
