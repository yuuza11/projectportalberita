<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class TeknologiController extends Controller
{
    public function index()
    {
        $newsItems = News::where('category', 'teknologi')->latest()->paginate(9);
        return view('teknologi', compact('newsItems'))->with('title', 'Teknologi');
    }
}
