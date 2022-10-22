<x-booking-layout title="Proses" active="process">
    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="title mb-5">
                <h2 class="fw-bolder mb-3">Instruksi Pembayaran</h2>
                <h6 class="fw-bold"> Silahkan lakukan pembayaran sebelum 1x24 jam</h6>
            </div>
        </div>
    </div>
    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="row m-0 justify-content-lg-between justify-content-center">
                <div class="col-lg-7 p-0">

                    <div class="payment-info alert fade show mb-5 p-0">
                        <h5 class="fw-bolder mb-3">Transfer Melalui Nomor Rekening Berikut</h5>
                        <div class="rounded-12 bg-white overflow-hidden">
                            <div class="p-3 px-4 pb-2 d-flex align-items-center justify-content-between">
                                <h6 class="fw-bold m-0 mt-1">{{ $data->payment_name }}</h6>
                                <img src="{{ asset('assets/frontend/images/banks/' . $data->payment_name . '.png') }}"
                                    width="100">
                            </div>
                            <hr class="border-2 mt-0">
                            <div class="p-4">
                                <div class="row m-0">
                                    <div class="col-lg-5 p-0">
                                        <p class="fw-bold text-secondary">Nomer Rekening</p>
                                    </div>
                                    <div class="col-lg-6 p-0 mt-lg-0 mt-2">
                                        <p class="fw-bold">1120.123131.1312312</p>
                                    </div>
                                </div>
                                <div class="row m-0 mt-3">
                                    <div class="col-lg-5 p-0">
                                        <p class="fw-bold text-secondary">Nama</p>
                                    </div>
                                    <div class="col-lg-6 p-0 mt-lg-0 mt-2">
                                        <p class="fw-bold">Dolan Banyumas</p>
                                        <p class="fw-bold text-secondary">Admin Penerbang Roket</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 mt-3 p-4 bgColor text-white">
                                <div class="col-lg-5 p-0">
                                    <p class="fw-bold">Total Transfer</p>
                                </div>
                                <div class="col-lg-6 p-0 mt-lg-0 mt-2">
                                    <p class="fw-bold themeColor">
                                        @idr($data->transaction_total)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="completed alert fade show mb-5 p-0">
                        <h5 class="fw-bolder mb-3">Bukti Pembayaran</h5>
                        <div class="p-4 rounded-12 bg-white">
                            <p class="fw-bold text-secondary mb-3">
                                Silahkan upload bukti pembayaran anda
                            </p>
                            <form action="{{ route('tour.checkout-tour') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="transaction_tours_id" id="transaction_tours_id"
                                    value="{{ $datas->id }}">
                                <input type="file" name="image" id="image"
                                    accept="image/png, image/gif, image/jpeg"
                                    class="form-control border px-4 py-3 rounded-12 fw-bold text-sm" required>
                                <input type="hidden" name="name" id="name" value="{{ $data->payment_name }}">
                                <input type="hidden" name="type" id="type" value="{{ $data->payment_type }}">

                                <button type="submit"
                                    class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6 mt-4">
                                    <p>Saya Sudah Bayar</p>
                                </button>
                                <a href="{{ route('myorder') }}"
                                    class="btn btn-outline-secondary fw-bold text-dark w-100 rounded-6 mt-4">
                                    <p>Bayar Nanti</p>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 p-0 ps-lg-5">
                    <div class="notice mb-5 p-0">
                        <div class="p-4 rounded-12 bg-white">
                            <h5 class="fw-bolder m-0">Detail Pemesanan</h5>
                            <hr class="text-secondary">
                            <h6 class="fw-bold baseColor mb-2">{{ $tour->title }}</h6>
                            <p class="fw-bold my-1">{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}
                            </p>
                            <p class="fw-bold my-1">
                                {{ $datas->people }} Tiket
                            </p>

                            <hr class="text-secondary mt-4">
                            <h5 class="fw-bolder mb-2">Informasi Pemesan</h5>
                            <p class="fw-bold my-1">{{ $datas->name }}</p>
                            <p class="fw-bold my-1">{{ $datas->email }}</p>
                            <p class="fw-bold my-1">{{ $datas->phone_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-booking-layout>
