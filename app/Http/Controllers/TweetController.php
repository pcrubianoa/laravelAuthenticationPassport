<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tweets()->with(['user'])->get();
    }
}
