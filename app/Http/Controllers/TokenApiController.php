<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TokenApiController extends Controller
{
    public function getToken()
    {
        $user = User::first();
        $token = $user->createToken('Bearer Token');

        return ['token' => $token->plainTextToken];
    }
}
