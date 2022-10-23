<x-app-layout title="Orderan Saya" active="my-order">
    @push('addonStyle')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <style>
            .retrieve {
                margin-top: 170px;
            }

            .rounded-8 {
                border-radius: 8px !important;
            }

            .nav-link.active {
                background-color: var(--blueColor) !important;
                color: white !important;
            }
        </style>
    @endpush

    <section class="container retrieve">
        <x-admin.alert />
        <div class="row m-0">
            <div class="col-md-3 p-0">
                <div class="nav flex-column nav-pills me-3 border rounded-12 p-4" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button
                        class="nav-link fw-bold px-0 py-3 my-1 rounded-8 d-flex align-items-center justify-content-center active"
                        id="lodgings-tab" data-bs-toggle="pill" data-bs-target="#lodgings" type="button" role="tab"
                        aria-controls="lodgings" aria-selected="true">
                        <h5 class="m-0 me-3"><i class="fas fa-ticket-alt"></i></h5>
                        <p class="m-0">Tiket Wisata</p>
                    </button>
                    <button
                        class="nav-link fw-bold px-0 py-3 my-1 rounded-8 d-flex align-items-center justify-content-center baseColor"
                        id="transportations-tab" data-bs-toggle="pill" data-bs-target="#transportations" type="button"
                        role="tab" aria-controls="transportations" aria-selected="false">
                        <h5 class="m-0 me-3"><i class="fas fa-plane-departure"></i></h5>
                        <p class="m-0">Transportations</p>
                    </button>
                </div>
            </div>
            <div class="col-md-9 p-0 ps-md-5">
                <div class="tab-content mt-md-0 mt-4" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="lodgings" role="tabpanel"
                        aria-labelledby="lodgings-tab">
                        @if ($data->where('users_id', Auth::user()->id)->paginate(10)->count() > 0)
                            @foreach ($data->where('users_id', Auth::user()->id)->paginate(10) as $d)
                                <div class="rounded-12 overflow-hidden shadow-base mb-4">
                                    @if ($d->transaction_status == 'PENDING')
                                        <div class="bg-warning p-2 text-center">
                                            <p class="fw-bold text-white">Untuk Menyelesaikan Orderan Mohon Lakukan <a
                                                    href="{{ route('myorder.tour.payment') }}"
                                                    class="text-decoration-none baseColor">Pembayaran</a>
                                            </p>
                                        </div>
                                    @elseif($d->transaction_status == 'WAITING')
                                        <div class="bg-warning p-2 text-center">
                                            <p class="fw-bold text-white">Menunggu Admin Melakukan Konfirmasi</p>
                                        </div>
                                    @elseif($d->transaction_status == 'SUCCESSFUL')
                                        <div class="bgTheme p-2 text-center">
                                            <p class="fw-bold text-white">Vocher Sudah Bisa Di Print</p>
                                        </div>
                                    @elseif($d->transaction_status == 'FAILED')
                                        <div class="bg-danger p-2 text-center">
                                            <form action="" method="get">
                                                @csrf
                                                <p class="fw-bold text-white">Failed Purchase
                                                    <button type="submit"
                                                        class="btn shadow-none p-0 pb-1 fw-bold text-warning">
                                                        <p>Delete</p>
                                                    </button>
                                                </p>
                                            </form>
                                        </div>
                                    @endif
                                    <div class="w-100 py-3 px-4">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between"
                                            style="margin-top: -10px;">
                                            <button
                                                class="btn bgColor bgHover text-white fw-bold px-4 rounded-8 shadow-none me-3"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#{{ $d->transaction_code }}" aria-expanded="false"
                                                aria-controls="{{ $d->transaction_code }}" style="margin-top: 10px;">
                                                <p class="m-0 fw-bold">
                                                    {{ $d->tour->title }} <i class="fas fa-eye"></i>
                                                </p>
                                            </button>
                                            <div class="d-flex" style="margin-top: 10px;">
                                                <p
                                                    class="mb-0 fw-bold {{ $d->transaction_status == 'SUCCESSFUL' ? 'bgTheme' : ($d->transaction_status == 'FAILED' ? 'bg-danger' : 'bg-warning') }} text-white px-4 py-2 rounded-8">
                                                    {{ $d->transaction_status }}</p>
                                                @if ($d->transaction_status == 'PENDING')
                                                    <form action="{{ route('myorder.tour.cancel', $d->id) }}">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn mb-0 fw-bold bg-danger text-white px-4 ms-3 rounded-8"
                                                            onclick="return confirm('Batalkan Order?');">
                                                            <p>BATALKAN</p>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="collapse multi-collapse" id="{{ $d->transaction_code }}">
                                            <div class="rounded-12 overflow-hidden shadow-base mt-4">
                                                <div class="row align-items-center m-0">
                                                    <div class="col-lg-4 p-4"><img
                                                            src="{{ $d->tour->galleries->count() ? asset('storage/' . $d->tour->galleries->first()->image) : asset('assets/img/no-image.png') }}"
                                                            width="100%" class="me-4 rounded-8"></div>
                                                    <div class="col-lg-8 py-lg-4 pt-1 pb-4 px-lg-0 px-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between pe-4 flex-wrap">
                                                            <div>
                                                                <h4 class="m-0 fw-bolder fw-medium">
                                                                    {{ $d->tour->title }}</h4>
                                                                <h6 class="m-0 fw-bold fw-medium my-2">
                                                                    {{ $d->tour->type }}</h6>
                                                            </div>
                                                            <h6 class="m-0 fw-bolder themeColor fw-medium">
                                                                #{{ $d->transaction_code }}</h6>
                                                        </div>
                                                        <hr class="text-secondary">
                                                        <div class="row m-0 justify-content-between">
                                                            <div class="col-lg-5 p-0">
                                                                <p class="m-0 fw-bold fw-medium mb-1">
                                                                    {{ $d->name }}</p>
                                                                <p class="m-0 fw-bold fw-medium mb-1">
                                                                    {{ $d->email }}</p>
                                                                <p class="m-0 fw-bold fw-medium mb-1">+
                                                                    {{ $d->phone_number }}</p>
                                                            </div>
                                                            <div class="col-lg-5 p-0">
                                                                <hr class="text-secondary d-block d-lg-none">
                                                                <p class="m-0 fw-bold fw-medium mb-1">
                                                                    {{ $d->people }} Tiket</p>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bgColor p-3">
                                                    <div
                                                        class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                                                        <p class="fw-bold text-white m-0 me-2">Tanggal</p>
                                                        <p class="fw-bold text-white m-0">
                                                            {{ Carbon\Carbon::parse($d->date)->isoFormat('dddd, D MMMM Y') }}
                                                        </p>
                                                    </div>

                                                </div>
                                                <div class="bgTheme p-3 text-center">
                                                    <p class="fw-bold text-white m-0">
                                                        @idr($d->transaction_total)
                                                    </p>
                                                </div>
                                            </div>
                                            <form action="{{ route('myorder.voucher.tour') }}" target="_blank"
                                                method="post">
                                                @csrf

                                                <input type="hidden" name="kode" id="kode"
                                                    value="{{ $d->transaction_code }}">
                                                <button type="submit"
                                                    class="btn bgColor bgHover text-white fw-bolder rounded-8 mt-4 py-2 fw-medium w-100 {{ $d->transaction_status == 'PENDING' ? 'disabled' : ($d->transaction_status == 'WAITING' ? 'disabled' : ($d->transaction_status == 'FAILED' ? 'disabled' : '')) }}">
                                                    <p class="m-0">Voucher</p>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <img src="{{ asset('assets/frontend/images/empty.png') }}" width="300px">
                                <h4 class="fw-bolder baseColor my-4">Kamu Belum Memiliki Orderan</h4>
                                <a href="{{ route('destinations.index') }}"
                                    class="btn bgTheme fw-bold text-white px-5 rounded-8">
                                    Beli Tiket Sekarang
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="transportations" role="tabpanel"
                        aria-labelledby="transportations-tab">

                        <div class="text-center">
                            <img src="{{ asset('assets/frontend/images/empty.png') }}" width="300px">
                            <h4 class="fw-bolder baseColor my-4">Kamu Belum Memiliki Orderan</h4>
                            <a href="{{ route('destinations.index') }}"
                                class="btn bgTheme fw-bold text-white px-5 rounded-8">
                                Beli Tiket Sekarang
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');
        </script>
    @endpush
</x-app-layout>
