<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
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
            'tour' => $tour,
        ]);
    }

    public function payment_proccess(Tour $tour, Request $request)
    {
        $data = Transaction::where('transaction_code', $request->transaction_code)->first();

        return view('pages.user.tour-booking.payment_process', [
            'data' => $request,
            'datas' => $data,
            'tour' => $tour,
        ]);
    }
    public function checkout(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/payment',
            'public'
        );

        Payment::create($data);

        $datas = Transaction::findOrFail($request->transaction_tours_id);
        $datas->update([
            'transaction_status' => 'WAITING'
        ]);

        $data = Tour::findOrFail($datas->tour_id);
        $contact = 'https://api.whatsapp.com/send?phone=6285325483259&text=Halo,%20Saya%20' . $datas->name . '%20sudah%20melakukan%20pembayaran%20untuk%20' . $data->type . '%20yaitu%20' . $data->title . '.%20Berikut%20saya%20lampirkan%20bukti%20pembayaran%20:';

        return redirect()->route('checkout-progress')->with(['contact' => $contact]);
    }
}
