<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LEFT -->
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <span class="text-lg font-semibold text-gray-700">
                    🌡️ SensorApp
                </span>

                <!-- Menu -->
                <a href="/" class="text-gray-600 hover:text-blue-500 transition">
                    Home
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" 
                       class="text-gray-600 hover:text-blue-500 transition">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-4">

                @guest
                    <a href="{{ route('login') }}" 
                       class="text-blue-500 hover:underline">
                        Login
                    </a>

                    <a href="{{ route('register') }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                        Register
                    </a>
                @endguest

                @auth
                    <!-- Nama User -->
                    <span class="text-gray-700 font-medium">
                        👋 {{ Auth::user()->name }}
                    </span>

                    <!-- Logout (FIX: POST only) -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-100 text-red-600 px-3 py-2 rounded-lg hover:bg-red-200 transition duration-200">
                            Logout
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>