<x-app-layout>
    <main class="relative">
        <!-- Hero Section -->
        <div class="relative h-screen bg-cover bg-center bg-[url('{{ asset('images/hero-background.jpg') }}')]">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/30"></div>
            <div class="container mx-auto h-full flex flex-col justify-center items-center text-center">
                <div class="relative text-white p-8 rounded-lg">
                    <h2 class="text-4xl font-semibold mb-4 tracking-wide">Be Your True Self</h2>
                    <h1 class="text-8xl md:text-9xl font-bold mb-8 tracking-tight">Fit Fusion</h1>
                    @guest
                        <a href="#more-info" class="inline-block">
                            <button class="bg-white text-black rounded-full py-3 px-8 text-lg font-semibold transition duration-300 hover:bg-gray-200 hover:shadow-lg transform hover:-translate-y-1">LEARN MORE</button>
                        </a>
                    @endguest
                    @auth
                        @if(auth()->user()->role === 'user')
                            <div class="space-x-4">
                                <a href="{{ route('clients.create') }}" class="inline-block">
                                    <button class="bg-white text-black rounded-full py-3 px-8 text-lg font-semibold transition duration-300 hover:bg-gray-200 hover:shadow-lg transform hover:-translate-y-1">Become a client</button>
                                </a>
                                <a href="{{ route('coaches.create') }}" class="inline-block">
                                    <button class="bg-transparent text-white border-2 border-white rounded-full py-3 px-8 text-lg font-semibold transition duration-300 hover:bg-white/20 hover:shadow-lg transform hover:-translate-y-1">Become a coach</button>
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </main>

    <!-- More information section -->
    <section id="more-info" class="relative bg-gradient-to-b from-gray-900 to-black py-20">
        <div class="container mx-auto text-center text-white relative z-10 px-4">
            <h2 class="text-5xl font-bold mb-6">What We Offer</h2>
            <p class="text-xl mb-12 max-w-3xl mx-auto">Welcome to Fit Fusion! We're dedicated to helping you achieve your fitness goals while embracing your individuality.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card elements -->
                @foreach ([
                    ['title' => 'MY PROGRESS', 'image' => 'gym1.jpg', 'description' => 'Track your fitness progress and reach your goals with our comprehensive progress tracking tools.'],
                    ['title' => 'MY PLANS', 'image' => 'gym2.jpg', 'description' => 'Access personalized workout plans designed to help you achieve your fitness objectives.'],
                    ['title' => 'MY COACH', 'image' => 'gym3.jpg', 'description' => 'Get guidance and support from our expert coaches to stay motivated and on track.'],
                ] as $card)
                    <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <img class="w-full h-64 object-cover" src="{{ asset('Images/' . $card['image']) }}" alt="{{ $card['title'] }}">
                        <div class="p-6">
                            <h3 class="font-bold text-2xl mb-3 text-center">{{ $card['title'] }}</h3>
                            <p class="text-gray-300 text-lg">{{ $card['description'] }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                window.scrollTo({
                    top: target.offsetTop,
                    behavior: 'smooth',
                });
            });
        });
    </script>
</x-app-layout>
