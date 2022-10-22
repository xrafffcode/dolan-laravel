<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class TourController extends Controller
{

    public function index()
    {
        return view('pages.user.tour', [
            'tours' => Tour::paginate(6)
        ]);
    }



    public function show($location, Tour $tour)
    {
        $member = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('pages.user.detail-tour', [
            'detail' => $tour,
            'members' => $member,
        ]);
    }

    public function filter(Request $request)
    {

        $data = Tour::with('galleries');
        $keyword = $request->all();

        if (isset($keyword['priceRange'])) {
            $data->where('price', '>', $keyword['priceRange']);
        }

        return view('pages.user.tour', [
            'tours' => $data->paginate(6),
        ]);
    }


    public function searchTour(Request $request)
    {
        return Tour::select('title')->where('title', 'like', '%' . $request->q . '%')->pluck('title');
    }

    public function search(Request $request)
    {

        $tours = Tour::where('title', 'like', '%' . $request->title . '%')->paginate(6);

        return view('pages.user.tour', [
            'tours' => $tours
        ]);
    }
}
