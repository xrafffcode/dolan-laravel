<x-booking-layout title="Pembayaran" active="payment">
    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="title mb-5">
                <h2 class="fw-bolder mb-3">Pembayaran</h2>
                <h6 class="fw-bold">Pilih metode pembayaran yang anda inginkan</h6>
            </div>
        </div>
    </div>
    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="row m-0 justify-content-lg-between justify-content-center">
                <div class="col-lg-7 p-0">
                    <div class="payment-info alert fade show mb-5 p-0">
                        <div class="p-4 rounded-12 bg-white">

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h5 class="fw-bold my-4">Bank Transfer</h5>
                                    <div
                                        class="p-3 d-flex align-items-center border-theme bg-theme-light rounded-3 mb-4">
                                        <h5 class="themeColor m-0 me-3"><i class="fas fa-info-circle"></i></h5>
                                        <p class="fw-bold">
                                            Kamu bisa melakukan pembayaran melalui transfer bank ke rekening berikut:
                                        </p>
                                    </div>
                                    <h6 class="fw-bold">Pilih Bank</h6>
                                    <form action="{{ route('tour.payment_process', $tour->slug) }}" method="POST">
                                        @csrf
                                        <div
                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                            <div class="form-check m-0">
                                                <input class="form-check-input border shadow-none mt-1 me-3"
                                                    type="radio" name="payment_name" id="Mandiri" value="Mandiri">
                                                <label class="form-check-label" for="Mandiri">
                                                    <p class="fw-bold">Mandiri Transfer</p>
                                                </label>
                                            </div>
                                            <img src="{{ asset('assets/frontend/images/banks/Mandiri.png') }}"
                                                width="55">
                                        </div>
                                        <div
                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                            <div class="form-check m-0">
                                                <input class="form-check-input border shadow-none mt-1 me-3"
                                                    type="radio" name="payment_name" id="BCA" value="BCA">
                                                <label class="form-check-label" for="BCA">
                                                    <p class="fw-bold">BCA Transfer</p>
                                                </label>
                                            </div>
                                            <img src="{{ asset('assets/frontend/images/banks/BCA.png') }}"
                                                width="55">
                                        </div>
                                        <div
                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                            <div class="form-check m-0">
                                                <input class="form-check-input border shadow-none mt-1 me-3"
                                                    type="radio" name="payment_name" id="BRI" value="BRI">
                                                <label class="form-check-label" for="BRI">
                                                    <p class="fw-bold">BRI Transfer</p>
                                                </label>
                                            </div>
                                            <img src="{{ asset('assets/frontend/images/banks/BRI.png') }}"
                                                width="55">
                                        </div>
                                        <div
                                            class="px-3 d-flex align-items-center justify-content-between border rounded-3 mt-3">
                                            <div class="form-check m-0">
                                                <input class="form-check-input border shadow-none mt-1 me-3"
                                                    type="radio" name="payment_name" id="BNI" value="BNI">
                                                <label class="form-check-label" for="BNI">
                                                    <p class="fw-bold">BNI Transfer</p>
                                                </label>
                                            </div>
                                            <img src="{{ asset('assets/frontend/images/banks/BNI.png') }}"
                                                width="55">
                                        </div>
                                        <div class="bg-color-light px-3 py-4 rounded-12 my-4">
                                            <div class="row m-0 justify-content-between">
                                                <div class="col-8 p-0">
                                                    <p class="fw-bold">Total Harga</p>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <p class="fw-bold float-end">@idr($data->transaction_total)</p>

                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="payment_type" id="payment_type"
                                            value="Bank Transfer">
                                        <input type="hidden" name="transaction_code" id="transaction_code"
                                            value="{{ $data->transaction_code }}">
                                        <input type="hidden" name="transaction_total" id="transaction_total"
                                            value="{{ $data->transaction_total }}">
                                        <button type="submit"
                                            class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">
                                            <p>Bayar Sekarang</p>
                                        </button>
                                    </form>
                                    <p class="fw-bold mt-4 text-center">Dengan melanjutkan, Anda menyetujui <a
                                            href="#" class="text-decoration-none text-primary">Syarat dan
                                            Ketentuan</a> kami</p>
                                    </p>
                                </div>

                            </div>
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
                                {{ $data->people }} Tiket
                            </p>

                            <hr class="text-secondary mt-4">
                            <h5 class="fw-bolder mb-2">Informasi Pemesan</h5>
                            <p class="fw-bold my-1">{{ $data->name }}</p>
                            <p class="fw-bold my-1">{{ $data->email }}</p>
                            <p class="fw-bold my-1">{{ $data->phone_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-booking-layout>
