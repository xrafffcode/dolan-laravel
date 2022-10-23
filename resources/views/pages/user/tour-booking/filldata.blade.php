<x-booking-layout title="Booking" active="fill-in-data">

    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="title mb-5">
                <h2 class="fw-bolder mb-3">Pemesanan Tiket {{ $destination->title }}</h2>
                <h6 class="fw-bold">Isi data dibawah dengan benar</h6>
            </div>
        </div>
    </div>
    <div class="row m-0 justify-content-center">
        <div class="col-lg-10 p-0">
            <div class="row m-0 justify-content-lg-between justify-content-center">
                <div class="col-lg-7 p-0 pe-lg-5">

                    <div class="information mb-5">
                        <h6 class="fw-bolder mb-3">Informasi Pribadi</h6>
                        <div class="p-4 rounded-12 bg-white">
                            <form action="{{ route('tour.review', $destination->slug) }}" method="post">
                                @csrf

                                <input type="hidden" name="date" id="date" value="{{ $data->check_in }}">
                                <input type="hidden" name="people" id="people" value="{{ $data->total_person }}">
                                <input type="hidden" name="transaction_total" id="transaction_total"
                                    value="{{ $total }}">

                                <div class="form-group">
                                    <label for="name" class="form-label fw-bold">
                                        <p>Nama Lengkap</p>
                                    </label>
                                    <input type="text" name="name" id="name"
                                        class="form-control border px-2 py-1 rounded-3 shadow-none" required>
                                    <p class="text-sm text-secondary mt-2">
                                        Nama lengkap sesuai KTP
                                    </p>
                                </div>
                                <div class="row m-0 mt-4">
                                    <div class="col-lg-6 p-0">
                                        <div class="form-group">
                                            <label for="email" class="form-label fw-bold">
                                                <p>Alamat Email</p>
                                            </label>
                                            <input type="email" name="email" id="email"
                                                class="form-control border px-2 py-1 rounded-3 shadow-none" required>
                                            <p class="text-sm text-secondary mt-2">
                                                Email yang digunakan untuk login
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-0 ps-lg-4">
                                        <div class="form-group">
                                            <label for="phone_number" class="form-label fw-bold">
                                                <p>Nomer Hp Aktif</p>
                                            </label>
                                            <input type="number" name="phone_number" id="phone_number"
                                                class="form-control border px-2 py-1 rounded-3 shadow-none" required>
                                            <p class="text-sm text-secondary mt-2">
                                                Contoh: 081234567890
                                            </p>
                                        </div>
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
                                    @idr($total)
                                </h6>
                            </div>
                            <hr class="mt-3 mb-4 text-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-bold">@idr($destination->price) x {{ $total_person }} Tiket</h6>
                                <h6 class="fw-bold"> @idr($price)</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fw-bold">Biaya Layanan</h6>
                                <h6 class="fw-bold"> @idr($service) </h6>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6">
                            Lanjut
                        </button>
                        </form>
                    </div>
                    <p class="fw-bold mb-5 text-center">Dengan melanjutkan, Anda menyetujui <a href="#"
                            class="text-decoration-none text-primary">Syarat dan Ketentuan</a> kami</p>
                    </p>
                </div>
                <div class="col-lg-5 p-0">
                    <div class="detail mb-5">
                        <div class="rounded-12 bg-white overflow-hidden">
                            <img src="{{ $destination->galleries->count() ? asset('storage/' . $destination->galleries->first()->image) : 'https://source.unsplash.com/1200x400/?travel' }}"
                                alt="destination" class="img-fluid p-4 w-100" style="border-radius: 2em;">
                            <div class="d-flex justify-content-center align-items-center">

                                <h5 class="fw-bold m-0">{{ $destination->title }}</h5>
                            </div>
                            <div class="bgColor p-4 mt-3">

                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold text-white m-0">Tanggal </p>
                                    <p class="fw-bold text-white m-0">
                                        {{ \Carbon\Carbon::parse($data->check_in)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-booking-layout>
