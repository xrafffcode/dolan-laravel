<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        return view('pages.user.myorder', [
            'data' => Transaction::with(['tour', 'user']),

        ]);
    }

    public function cancelTour(Request $request)
    {
        $item = Transaction::findOrFail($request->id)->delete();
        return redirect()->back()->with('success', 'Pemesanan berhasil dibatalkan');
    }

    public function voucherTour()
    {
        return view('pages.user.voucher', [
            'data' => Transaction::with(['tour', 'user'])->where('transaction_code', request('kode'))->firstOrFail()
        ]);
    }

    public function paymentTour()
    {
        return view('pages.user.payment', [
            'destinations' => Transaction::with(['tour', 'user'])->where('users_id', Auth::user()->id)->where('transaction_status', 'PENDING')->get(),

        ]);
    }

    public function processPaymentTour(PaymentRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/payment',
            'public'
        );

        try {
            Payment::create($data);
            Transaction::where('id', $request->transaction_tours_id)->update([
                'transaction_status' => 'WAITING'
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('myorder')->with('success', 'Pembayaran berhasil dikirim');
    }
}
