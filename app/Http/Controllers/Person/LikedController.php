<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    public function index()
    {
        return view('person.liked.index');
    }
}
