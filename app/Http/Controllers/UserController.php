<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function show($user_id) {
        Log::debug("Entering UserCotroller.show with: " . $user_id);

        $user = User::findOrFail($user_id);

        return view('profile.show', [
            'user' => $user
        ]);
    }

    public function index() {

    }
}
