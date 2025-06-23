<x-layout>
    <x-slot:title>{{ $news->title }}</x-slot>

    <div class="bg-gray-900 min-h-screen p-6 rounded-xl text-white mx-auto">
        <img src="{{ asset('storage/' . $news->image) }}" alt="image" class="w-3xl h-auto object-cover rounded-xl mb-6 mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
        <p class="text-sm text-gray-400 mb-6">Dipublikasikan: {{ $news->created_at->format('d M Y') }}</p>
        <div class="text-gray-200 leading-relaxed space-y-4">
            @foreach(explode("\n", $news->description) as $paragraph)
                @if (trim($paragraph) !== '')
                    <p>{{ $paragraph }}</p>
                @endif
            @endforeach
        </div>
    </div>

    <section class="mt-10">
    <h3 class="text-gray-200 text-xl font-bold mb-4">Komentar</h3>

    @auth
        <form method="POST" action="{{ url('/komentar') }}" class="mb-6 text-gray-200">
            @csrf
            <input type="hidden" name="berita_id" value="{{ $news->id }}">
            <textarea name="content" rows="3" class="w-full border rounded-lg p-3 focus:ring focus:ring-gray-300" placeholder="Tulis komentar..."></textarea>
            <button type="submit" class="mt-2 bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">Kirim</button>
        </form>
    @else
        <p class="text-gray-200">Silakan <a href="{{ route('login') }}" class="text-blue-700 underline">login</a> untuk berkomentar.</p>
    @endauth

    <div class="space-y-4 mt-6">
        @forelse ($news->comments as $comment)
            <div class="flex gap-3 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold">
                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                </div>
                <div class="bg-gray-600 p-4 rounded-xl shadow max-w-xl">
                    <div class="text-sm font-semibold text-gray-200">{{ $comment->user->name }}</div>
                    <div class="text-gray-100 mt-1">{{ $comment->content }}</div>
                    <div class="text-xs text-gray-200 mt-1">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @empty
            <p class="text-gray-200">Belum ada komentar.</p>
        @endforelse
    </div>
</section>



</x-layout>
