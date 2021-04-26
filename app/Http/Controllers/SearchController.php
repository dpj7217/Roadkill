<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search() {
        return view('search/showResults');
    }

    public function show() {
        return view('search/search');
    }
}
