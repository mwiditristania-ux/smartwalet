<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="text-xl font-bold text-blue-500">
                🌡️ SensorApp
            </div>

            <!-- Menu -->
            <div class="flex items-center gap-6 text-gray-600 font-medium">
                <a href="/dashboard" class="hover:text-blue-500 transition">Dashboard</a>
                <a href="/sensors" class="hover:text-blue-500 transition">Data Sensor</a>
                <a href="/profile" class="hover:text-blue-500 transition">Profile</a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-400 text-white px-3 py-1 rounded-lg hover:bg-red-500 transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>