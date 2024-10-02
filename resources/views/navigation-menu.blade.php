<nav x-data="{ open: false }" class="bg-white ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('Images/dumbell.png') }}" alt="Personal Training Icon" class="w-20 h-20">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-6 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    @auth()
                        @if(auth()->user()->role === 'client')
                            <x-nav-link href="{{ route('clients.profile') }}" :active="request()->routeIs('clients.profile')">
                                {{ __('View Profile') }}
                            </x-nav-link>
                        @endif
                            @if(auth()->user()->role === 'coach')
                                <x-nav-link href="{{ route('coach.profile') }}" :active="request()->routeIs('coach.profile')">
                                    {{ __('View Profile') }}
                                </x-nav-link>
                            @endif
                        @if(auth()->user()->role === 'admin')
                        <x-nav-link href="{{ route('admin') }}" :active="request()->routeIs('admin')">
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>
                        @elseif(auth()->user()->role !== 'admin')




                                @if(auth()->user()->role === 'client')
                                    <x-nav-link href="{{ route('coaches.coach-index') }}" :active="request()->routeIs('coaches.coach-index')">
                                        {{ __('Coaches') }}
                                    </x-nav-link>
                                    <x-nav-link href="{{ route('client.dashboard') }}" :active="request()->routeIs('client.dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-nav-link>

                                @endif
                                    @if(auth()->user()->role === 'coach')
                                        <x-nav-link href="{{ route('clients.client-index') }}" :active="request()->routeIs('clients.client-index')">
                                            {{ __('Clients') }}
                                        </x-nav-link>
                                        <x-nav-link href="{{ route('coach.dashboard') }}" :active="request()->routeIs('coach.dashboard')">
                                            {{ __('Dashboard') }}
                                        </x-nav-link>

                                    @endif


                        @endif
                    @endauth



                    @auth
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 transition duration-150 ease-in-out" style="margin-top: 7px;">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    @endauth

                    @guest
                        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    @endguest
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-1 pb-2 space-y-1"> <!-- Reduced padding -->
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-2 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-1 space-y-1"> <!-- Reduced margin -->
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        @endauth
    </div>
</nav>
<script>
    function handleLogout(){
        // Create a form dynamically to submit the logout request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('logout') }}';

        // Add CSRF token input to the form
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
</script>
