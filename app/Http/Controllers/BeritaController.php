<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class BeritaController extends Controller
{
    public function show($slug)
{
    $news = News::where('slug', $slug)->with('comments.user')->firstOrFail();
    return view('show', compact('news'));
}

public function search(Request $request)
{
    $query = $request->input('query');

    if (empty($query)) {
        $newsItems = collect();
    } else {
        $newsItems = News::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->paginate(9);
    }

    return view('search', compact('newsItems', 'query'));
}

}