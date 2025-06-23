<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  <section class="container mx-auto px-4 py-8 grid gap-6 grid-cols-1 md:grid-cols-3">

            @foreach ($newsItems as $news)
              <a href="{{ route('show', $news->slug) }}">
                <div class="bg-gray-700 rounded-lg p-4 shadow hover:shadow-xl transition flex flex-col h-full">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="image" class="w-full h-48 object-cover">
                        <h3 class="text-xl text-gray-400 font-semibold mt-4 mb-2">{{ $news->title }}</h3>
                        <p class="text-gray-300 text-sm">{{ Str::limit($news->description, 100) }}</p>
                </div>
              </a>
            @endforeach

</x-layout>