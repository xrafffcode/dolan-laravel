<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookTourController extends Controller
{
    public function store(Tour $tour, Request $request)
    {
        $price = $tour->price * $request->total_person;
        $service = $price * 0.1;

        return view('pages.user.tour-booking.filldata', [
            'tour' => $tour,
            'data' => $request,
            'destination' => $tour,
            'total_person' => $request->total_person,
            'price' => $price,
            'service' => $service,
            'total' => $price + $service
        ]);
    }

    public function review(Tour $tour, Request $request)
    {
        return view('pages.user.tour-booking.review', [
            'data' => $request,
            'tour' => $tour
        ]);
    }

    public function payment(Tour $tour, Request $request)
    {
        Transaction::create($request->all());

        return view('pages.user.tour-booking.payment', [
            'data' => $request,
            'tour' => $tour
        ]);
    }
}
