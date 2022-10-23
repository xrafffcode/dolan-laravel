<x-app-layout title="Kendaraan" active="transportation">
    @push('addonStyle')
        <style>
            body,
            input,
            input:focus,
            select {
                background: #f2f0ff !important;
            }

            .detail-page {
                margin-top: 120px;
            }

            .bg-lightning {
                background-color: rgb(216, 220, 230);
            }
        </style>
    @endpush


    <section class="container detail-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold">
                    <a href="{{ url('/') }}" class="text-decoration-none baseColor" style="font-size: 14px;">Home</a>
                </li>
                <li class="breadcrumb-item fw-bold" aria-current="page">
                    <a href="{{ url('/') }}" class="text-decoration-none baseColor"
                        style="font-size: 14px;">Transportations</a>
                </li>
                <li class="breadcrumb-item fw-bold" aria-current="page">
                    <a href="{{ url('/') }}" class="text-decoration-none baseColor"
                        style="font-size: 14px;">{{ $detail->type }}</a>
                </li>
                <li class="breadcrumb-item fw-bold" aria-current="page">
                    <a href="{{ url('/') }}" class="text-decoration-none text-base"
                        style="font-size: 14px;">{{ $detail->company_name }}</a>
                </li>
            </ol>
        </nav>
        <div class="row m-0 my-5 justify-content-between">
            <div class="travel-detail col-lg-6 p-0">
                <div class="card border-0 rounded-12 p-lg-5 p-4">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $detail->image) }}" alt="" class="img-fluid">
                        <div class="travel-title">
                            <h2 class="fw-bolder baseColor mt-4 mb-3">{{ $detail->company_name }}</h2>
                            <div class="d-flex align-items-center text-secondary">
                                @if ($detail->type == 'Flights')
                                    <h6 class="m-0"><i class="fas fa-plane-departure"></i></h6>
                                @elseif($detail->type == 'Trains')
                                    <h6 class="m-0"><i class="fas fa-train"></i></h6>
                                @else
                                    <h6 class="m-0"><i class="fas fa-bus"></i></h6>
                                @endif
                                <h6 class="fw-bold m-0 ms-3">{{ $detail->type }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transaction col-lg-5 p-0 m-lg-0 mt-5">
                <div class="card border-0 rounded-12 mb-5 p-0">
                    <div class="w-100 bgColor text-center py-3 members">
                        <h5 class="text-white fw-bold m-0">Booking Tiket {{ $detail->company_name }}</h5>
                    </div>
                    <div class="card-body transaction-detail">
                        <h5 class="mb-4 fw-bold baseColor">Informasi Pemesanan</h5>
                        <form action="" method="post">
                            @csrf

                            <div class="row align-items-center justify-content-between m-0 p-0 my-4">
                                <div class="col-md-6 pe-md-2 p-0">
                                    <div class="form-group">
                                        <label for="from" class="form-label fw-bold text-base">
                                            <p>Dari</p>
                                        </label>
                                        <select name="from" id="from"
                                            class="form-select py-2 px-3 mt-1 shadow-none text-secondary">
                                            <option selected disabled hidden>Tempat Kamu</option>
                                            <option value="Jakarta">Jakarta</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="Yogyakarta">Yogyakarta</option>
                                            <option value="Bali">Bali</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-md-2 mt-md-0 mt-4 p-0">
                                    <div class="form-group">
                                        <label for="to" class="form-label fw-bold text-base">
                                            <p>Ke</p>
                                        </label>
                                        <select name="to" id="to"
                                            class="form-select py-2 px-3 mt-1 shadow-none text-secondary">
                                            <option selected disabled hidden>Tempat Tujuan</option>
                                            <option value="Jakarta">Jakarta</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="Yogyakarta">Yogyakarta</option>
                                            <option value="Bali">Bali</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-between m-0 p-0 my-4">
                                <div class="col-md-6 pe-md-2 p-0">
                                    <div class="form-group">
                                        <label for="departure_date" class="form-label fw-bold text-base">
                                            <p>Tanggal Keberangkatan</p>
                                        </label>
                                        <input type="text" onfocus="(this.type='date')" id="departure_date"
                                            name="departure_date"
                                            class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                            placeholder="Select Date" required>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-md-2 mt-md-0 mt-4 p-0">
                                    <div class="form-group">
                                        <label for="departure_time" class="form-label fw-bold text-base">
                                            <p>Waktu</p>
                                        </label>
                                        <select name="departure_time" id="departure_time"
                                            class="form-select py-2 px-3 mt-1 shadow-none text-secondary">
                                            <option selected disabled hidden>Waktu Keberangkatan</option>
                                            <option value="4:30:00">4:30:00</option>
                                            <option value="6:00:00">6:00:00</option>
                                            <option value="7:30:00">7:30:00</option>
                                            <option value="10:00:00">10:00:00</option>
                                            <option value="11:30:00">11:30:00</option>
                                            <option value="13:00:00">13:00:00</option>
                                            <option value="15:00:00">15:00:00</option>
                                            <option value="17:30:00">17:30:00</option>
                                            <option value="19:00:00">19:00:00</option>
                                            <option value="21:00:00">21:00:00</option>
                                            <option value="23:30:00">23:30:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-between m-0 p-0 my-4">
                                <div class="col-md-6 pe-md-2 p-0">
                                    <div class="form-group">
                                        <label for="guests" class="form-label fw-bold text-base">
                                            <p>Jumlah Tiket</p>
                                        </label>
                                        <input type="number" id="guests" name="guests"
                                            class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                            placeholder="Berapa Orang?" required>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-md-2 mt-md-0 mt-4 p-0">
                                    <div class="form-group">
                                        <label for="class" class="form-label fw-bold text-base">
                                            <p>Kelas</p>
                                        </label>
                                        <select name="class" id="class"
                                            class="form-select py-2 px-3 mt-1 shadow-none text-secondary">
                                            <option selected disabled hidden>Pilih Kelas</option>
                                            <option value="Economy">Ekonomi</option>
                                            <option value="Bussiness">Bisnis</option>
                                            <option value="Premium">Premium</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @guest
                        <a href="{{ route('login') }}" class="btn shadow-none w-100 text-center py-3 btn-transaction">
                            <h5 class="text-white fw-bold m-0">Daftar Atau Masuk Untuk Melanjutkan</h5>
                        </a>
                    @endguest
                    @auth
                        <button type="submit" class="btn shadow-none w-100 text-center py-3 btn-transaction">
                            <h5 class="text-white fw-bold m-0">Pesan Sekarang</h5>
                        </button>
                    @endauth
                    </form>
                </div>
            </div>
        </div>

    </section>

    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');

            let galleries = document.querySelector('.thumbnails');
            let galleryThumb = document.querySelector('.img-thumb');
            let galleryMini = Array.from(document.querySelectorAll('.img-mini'));
            galleryMini.filter(e => e.src == galleryThumb.src).map(e => e.classList.add('active'));

            galleries.addEventListener('click', e => {
                if (e.target.className == 'img-mini') {
                    galleryThumb.src = e.target.src;
                    galleryThumb.classList.add('fade');

                    galleryMini.map(e => e.className = 'img-mini');

                    e.target.classList.add('active');

                    setTimeout(() => {
                        galleryThumb.classList.remove('fade');
                    }, 500);
                }
            });
        </script>
    @endpush
</x-app-layout>
