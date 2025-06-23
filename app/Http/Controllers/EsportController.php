<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class EsportController extends Controller
{
    public function index()
    {
        $newsItems = News::where('category', 'esport')->latest()->paginate(9);
        return view('esport', compact('newsItems'))->with('title', 'Esport');
    }
}
