<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function search() {
        Log::debug("Entering SearchController.search");

        return view('search/showResults');
    }

    public function show() {
        Log::debug("Entering SearchController.show");

        return view('search/search');
    }
}
