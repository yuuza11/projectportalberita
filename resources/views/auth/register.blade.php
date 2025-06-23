<x-guest-layout>

    <a href="{{ url('/') }}" class="absolute top-4 left-4 block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
        ← Beranda
    </a>

    <div class="max-w-md mx-auto mt-20 bg-gray-900 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl text-white font-bold mb-6 text-center">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-400">Nama</label>
                <input type="text" name="name" class="w-full border text-gray-400 px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-400">Email</label>
                <input type="email" name="email" class="w-full border text-gray-400 px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-400">Password</label>
                <input type="password" name="password" class="w-full border text-gray-400 px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-400">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border text-gray-400 px-3 py-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800">Daftar</button>
        </form>
        <p class="mt-4 text-white text-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-300 hover:underline">Login</a></p>
    </div>
</x-guest-layout>
