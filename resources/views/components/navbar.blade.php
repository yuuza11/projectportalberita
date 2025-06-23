<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="img/logonyus.png" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <x-navlink href="/" :active="request()->is('/')">Terbaru</x-navlink>
              <x-navlink href="olahraga" :active="request()->is('olahraga')">Olahraga</x-navlink>
              <x-navlink href="teknologi" :active="request()->is('teknologi')">Teknologi</x-navlink>
              <x-navlink href="hiburan" :active="request()->is('hiburan')">Hiburan</x-navlink>
              <x-navlink href="otomotif" :active="request()->is('otomotif')">Otomotif</x-navlink>
              <x-navlink href="esport" :active="request()->is('esport')">Esport</x-navlink>
            </div>
          </div>
        </div>

        <form action="{{ route('search') }}" method="GET" class="flex items-center gap-2">
          <input type="text" name="query"
              class="px-3 py-1.5 rounded-md bg-gray-800 text-white placeholder-gray-400 border border-gray-700 focus:outline-none focus:ring focus:border-gray-500"
              placeholder="Cari berita..." autocomplete="off">
          <button type="submit"
              class="bg-gray-900 text-white px-3 py-1.5 rounded-md hover:bg-gray-700 transition">
            Cari
          </button>
        </form>

        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            @auth
            <div class="relative ml-3">
              <div>
                <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="size-8 rounded-full" src="img/profileicon.png" alt="">
                  <p class="text-sm ml-2 text-gray-400">Halo, {{ Auth::user()->name }}</p>
                </button>
              </div>

              <div x-show="isOpen"
              x-transition:enter="transition ease-out duration-100 transform"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75 transform"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                        Keluar
                    </button>
                </form>
              </div>
            </div>
            @endauth

            @guest
              <a href="{{ route('login') }}" class="bg-gray-800 text-gray-100 px-4 py-2 rounded hover:bg-gray-700">Login</a>
            @endguest

          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-navlink href="/" :active="request()->is('/')">Terbaru</x-navlink>
              <x-navlink href="olahraga" :active="request()->is('olahraga')">Olahraga</x-navlink>
              <x-navlink href="teknologi" :active="request()->is('teknologi')">Teknologi</x-navlink>
              <x-navlink href="hiburan" :active="request()->is('hiburan')">Hiburan</x-navlink>
              <x-navlink href="otomotif" :active="request()->is('otomotif')">Otomotif</x-navlink>
              <x-navlink href="esport" :active="request()->is('esport')">Esport</x-navlink>
      </div>
      @auth
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-10 rounded-full" src="img/profileicon.png" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-gray-400">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
          </div>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</button>
          </form>
        </div>
      </div>
      @endauth

      @guest
        <a href="{{ route('login') }}" class="ml-2 inline-block rounded-md px-4 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Login</a>
      @endguest

    </div>
  </nav>