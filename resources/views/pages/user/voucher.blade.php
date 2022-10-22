<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tiket {{ $data->tour->title }}</title>
    <link rel="shortcut icon" href="{{ url('frontend/images/favicon.png') }}" type="image/x-icon">
    @include('includes.style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <style>
        .txt {
            font-size: 18px !important;
        }

        .border-left {
            border-left: 6px solid var(--blueColor);
        }

        .shadow-base {
            box-shadow: -4px 4px 20px rgba(118, 126, 148, 0.2);
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 0mm;
        }

        #download {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="header d-flex flex-wrap align-items-center justify-content-between">
            <h2 class="fw-bolder baseColor m-0 me-5">Tiket {{ $data->tour->title }}</h2>
            <a href="{{ route('home') }}" class="d-block"><img
                    src="{{ asset('assets/frontend/images/dolan-header.png') }}" width="120px"></a>
        </div>
        <div class="row m-0 mt-5">
            <div class="col-lg-4 p-0 mb-lg-0 mb-4">
                <h4 class="fw-bold mb-3">Transaction ID</h4>
                <h2 class="fw-bolder m-0 themeColor">{{ $data->id }}</h2>
            </div>
            <div class="col-lg-6 p-0">
                <h4 class="fw-bolder baseColor">{{ $data->tour->title }}
                    <span class="text-warning txt"><span class="mx-2"><i
                                class="fas fa-star"></i></span>{{ $data->tour->rating }}</span>
                </h4>
                <h6 class="fw-bold">{{ $data->tour->location }}</h6>
                <p class="fw-bold mt-4">Phone Number : +{{ $data->phone_number }}</p>
                <p class="fw-bold mt-2">Email Address : {{ $data->email }}</p>
                <div class="d-flex justify-content-between mt-4">
                    <div class="border-left py-3 px-4 pe-5">
                        <p class="fw-bold">Valid Sampai</p>
                        <h5 class="fw-bolder my-2">
                            {{ Carbon\Carbon::parse($data->date)->isoFormat('dddd, D MMMM Y') }}
                        </h5>

                    </div>

                </div>
            </div>
        </div>
        <hr class="rounded-12 text-secondary my-5" style="border: 2px solid;">
        <h4 class="fw-bolder mb-4">Detail Pemesanan</h4>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Pemesan</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->name }}</h6>
            </div>
        </div>
        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Jumlah Tiket</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0">{{ $data->people }}</h6>
            </div>
        </div>

        <div class="row m-0 my-3 align-items-center">
            <div class="col-lg-4 col-6 p-0">
                <h6 class="fw-bold m-0">Status Transaksi</h6>
            </div>
            <div class="col-6 p-0">
                <h6 class="fw-bold m-0 bgTheme text-white text-center p-2 fw-bold">{{ $data->transaction_status }}</h6>
            </div>
        </div>
        <hr class="rounded-12 text-secondary mt-5 mb-4" style="border: 2px solid;">
        <div class="row m-0 justify-content-between">
            <div class="col-lg-4 p-0">
                <div class="d-flex align-items-center my-2">
                    <h2 class="themeColor m-0 me-3"><i class="bi bi-clock-fill"></i></h2>
                    <div>
                        <p class="fw-bold mb-1 text-sm">Layanan Pelanggan</p>
                        <h5 class="fw-bolder m-0">0852-2548-3259</5>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 d-flex flex-wrap justify-content-between">
                <div class="my-2">
                    <p class="fw-bold mb-1 text-sm">Email</p>
                    <h5 class="fw-bolder m-0">wecare@dolan.com</h5>
                </div>
                <div class="rounded-12 mx-4"
                    style="border: 2px solid lightgray; color: lightgray; background: lightgray;"></div>
                <div class="my-2">
                    <p class="fw-bold mb-1 text-sm">Kode Transaksi</p>
                    <h5 class="baseColor fw-bolder m-0">{{ $data->transaction_code }}</h5>
                </div>
            </div>
        </div>
        <center>
            <button id="download"
                class="btn bgColor bgHover text-white px-5 py-2 mt-5 rounded-12 fw-bold shadow-none">Download
                Voucher</button>
        </center>
    </div>


    <script>
        document.querySelector('#download').addEventListener('click', () => {
            window.print();
        });
    </script>
    @include('includes.script')
</body>

</html>
