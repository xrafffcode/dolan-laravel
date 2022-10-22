<x-booking-layout title="Booking" active="review">

    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="title mb-5">
                <h2 class="fw-bolder mb-3">Mohon Periksa Kembali Data Anda</h2>
                <h6 class="fw-bold">Pastikan data yang anda masukkan sudah benar</h6>
            </div>
        </div>
    </div>
    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="row m-0 justify-content-lg-between justify-content-center">
                <div class="col-lg-7 p-0">
                    <div class="information mb-5">
                        <div class="p-4 rounded-12 bg-white">
                            <div class="row m-0 align-items-center">
                                <div class="col-lg-4 p-0">
                                    <img src="{{ $tour->galleries->count() ? Storage::url($tour->galleries->first()->image) : Storage::url('assets/gallery/default.jpg') }}"
                                        class="img-fluid rounded-12">
                                </div>
                                <div class="col-lg-8 p-0 ps-lg-4">
                                    <div class="d-flex justify-content-center align-items-center m-lg-0 mt-4">

                                        <h5 class="fw-bolder m-0">{{ $tour->title }}</h5>
                                    </div>
                                    <hr class="text-secondary">

                                    <p class="fw-bold m-0">Pemesan Untuk Tanggal:
                                        {{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</p>




                                </div>
                            </div>
                            <hr class="text-secondary mt-4">

                            <div class="row m-0 justify-content-between align-items-center">
                                <div class="col-lg-5 p-0">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="fw-bold text-secondary">Total Tiket</p>
                                        <p class="fw-bold">{{ $data->people }} Tiket</p>
                                    </div>

                                </div>
                                <div class="col-lg-5 p-0 mt-lg-0 mt-4 text-center">
                                    <img src="{{ $tour->galleries->skip(1)->count() ? Storage::url($tour->galleries->get(1)->image) : Storage::url('assets/gallery/default.jpg') }}"
                                        class="rounded-3 float-lg-end" width="60%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price mb-4">
                        <h6 class="fw-bolder mb-3">Price details</h6>
                        <div class="p-4 rounded-12 bg-white mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-bold">Total</h6>
                                <h6 class="fw-bold">
                                    @idr($data->people * $tour->price + $data->people * $tour->price * 0.1)
                                </h6>
                            </div>
                            <hr class="mt-3 mb-4 text-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-bold">@idr($tour->price) x {{ $data->people }} Tiket</h6>
                                <h6 class="fw-bold"> @idr($tour->price * $data->people)</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fw-bold">Biaya Layanan</h6>
                                <h6 class="fw-bold"> @idr($tour->price * $data->people * 0.1)</h6>
                            </div>
                        </div>
                        <form action="{{ route('tour.payment', $tour->slug) }}" method="POST">
                            @csrf

                            <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour->id }}">
                            <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="transaction_code" id="transaction_code"
                                value="{{ 'DLN' . mt_rand(1000, 9999) }}">
                            <input type="hidden" name="name" id="name" value="{{ $data->name }}">
                            <input type="hidden" name="email" id="email" value="{{ $data->email }}">
                            <input type="hidden" name="phone_number" id="phone_number"
                                value="{{ $data->phone_number }}">
                            <input type="hidden" name="date" id="date" value="{{ $data->date }}">
                            <input type="hidden" name="people" id="people" value="{{ $data->people }}">

                            <input type="hidden" name="transaction_total" id="transaction_total"
                                value="{{ $data->transaction_total }}">
                            <input type="hidden" name="transaction_status" id="transaction_status" value="PENDING">

                            <button type="submit"
                                class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">
                                Lanjutkan Pembayaran
                            </button>



                        </form>
                    </div>
                    <p class="fw-bold mb-5 text-center">Dengan melanjutkan, Anda menyetujui <a href="#"
                            class="text-decoration-none text-primary">Syarat dan Ketentuan</a> kami</p>
                    </p>
                </div>
                <div class="col-lg-5 p-0 ps-lg-5">
                    <div class="contact mb-5">
                        <div class="p-4 rounded-12 bg-white">
                            <h5 class="fw-bolder m-0">Informasi Kontak</h5>
                            <hr class="text-secondary">
                            <h6 class="fw-bold">{{ $data->name }}</h6>
                            <h6 class="fw-bold my-2">{{ $data->phone_number }}</h6>
                            <h6 class="fw-bold">{{ $data->email }}</h6>
                        </div>
                    </div>
                    <div class="policy mb-5">
                        <div class="p-4 rounded-12 bg-white">
                            <h5 class="fw-bolder m-0">Peraturan</h5>
                            <hr class="text-secondary">
                            <div class="d-flex align-items-center mb-2">
                                <h6 class="fw-bold themeColor me-3"><i class="fas fa-scroll"></i></h6>
                                <h6 class="fw-bold themeColor">Pembatalan</h6>
                            </div>
                            <p class="fw-bold text-secondary">
                                Tiket yang sudah dibeli tidak dapat dikembalikan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-booking-layout>
