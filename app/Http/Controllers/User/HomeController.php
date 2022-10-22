<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\Transportation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'tours' => Tour::with('galleries')->latest()->get(),
            'hotels' => Hotel::with('galleries')->latest()->get(),
            'transportations' => Transportation::latest()->get(),
        ]);
    }
}
