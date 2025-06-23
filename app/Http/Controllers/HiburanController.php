<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HiburanController extends Controller
{
    public function index()
    {
        $newsItems = News::where('category', 'hiburan')->latest()->paginate(9);
        return view('hiburan', compact('newsItems'))->with('title', 'Hiburan');
    }
}

