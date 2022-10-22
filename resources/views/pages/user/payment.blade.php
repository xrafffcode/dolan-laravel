<x-app-layout title="Orderan Saya" active="my-order">

    @push('addonStyle')
        <style>
            body {
                background-color: #f5f5f5;
            }
        </style>
    @endpush

    <div class="container " style="margin-top: 100px">

        <div class="row m-0 justify-content-center">
            <div class="col-lg-10 p-0">
                <div class="title mb-5">
                    <h2 class="fw-bolder mb-3">Pembayaran</h2>
                    <h6 class="fw-bold">Pilih metode pembayaran yang kamu inginkan</h6>
                </div>
            </div>
        </div>
        <div class="row m-0 justify-content-center">
            <div class="col-lg-10 p-0">
                @if ($errors->any())
                    <div class="alert alert-danger m-0 py-3 mb-4 ">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
                <div class="row m-0 justify-content-lg-between justify-content-center">
                    <div class="col-lg-12 p-0">
                        <div class="payment-info alert fade show mb-5 p-0">
                            <div class="rounded-12">

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="lodging" role="tabpanel"
                                        aria-labelledby="lodging-tab">

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="lodging-bank" role="tabpanel"
                                                aria-labelledby="lodging-bank-tab">
                                                <div class="row m-0 justify-content-lg-between justify-content-center">
                                                    <div class="col-lg-7 p-0 bg-white p-4 rounded-12">
                                                        <h5 class="fw-bold mb-4">Bank Transfer</h5>
                                                        <div
                                                            class="p-3 d-flex align-items-center border-theme bgColor rounded-3 mb-4">
                                                            <h5 class="themeColor m-0 me-3"><i
                                                                    class="fas fa-info-circle"></i></h5>
                                                            <p class="fw-bold text-white">
                                                                Kamu bisa melakukan pembayaran melalui ATM, Mobile
                                                                Banking,
                                                            </p>
                                                        </div>
                                                        <h6 class="fw-bold">Pilih Bank</h6>
                                                        <form action="{{ route('myorder.tour.process_payment') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div
                                                                class="px-3 d-flex align-items-center justify-content-between border rounded-3 my-3">
                                                                <div class="form-check m-0">
                                                                    <input
                                                                        class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                        type="radio" name="name" id="Mandiri"
                                                                        value="Mandiri">
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
                                                                    <input
                                                                        class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                        type="radio" name="name" id="BCA"
                                                                        value="BCA">
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
                                                                    <input
                                                                        class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                        type="radio" name="name" id="BRI"
                                                                        value="BRI">
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
                                                                    <input
                                                                        class="form-check-input border shadow-none mt-1 me-3 bg-primary"
                                                                        type="radio" name="name" id="BNI"
                                                                        value="BNI">
                                                                    <label class="form-check-label" for="BNI">
                                                                        <p class="fw-bold">BNI Transfer</p>
                                                                    </label>
                                                                </div>
                                                                <img src="{{ asset('assets/frontend/images/banks/BNI.png') }}"
                                                                    width="55">
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-4 p-0 mt-lg-0 mt-5">
                                                        <div class="bg-white p-4 rounded-12">
                                                            <input type="hidden" name="type" id="type"
                                                                value="Bank Transfer">
                                                            <input type="hidden" name="users_id" id="users_id"
                                                                value="{{ Auth::user()->id }}">
                                                            <input type="file" name="image" id="image"
                                                                class="form-control text-sm bg-white border py-3 px-4 rounded-12 mb-3 shadow-none fw-bold"
                                                                required>
                                                            <select name="transaction_tours_id"
                                                                id="transaction_tours_id"
                                                                class="form-select text-sm bg-white border py-3 px-4 shadow-none rounded-12 fw-bold"
                                                                required>
                                                                <option value="" selected disabled hidden>Select
                                                                    Transaction</option>
                                                                @foreach ($destinations as $data)
                                                                    <option value="{{ $data->id }}">
                                                                        #{{ $data->transaction_code }} -
                                                                        {{ $data->tour->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <button type="submit"
                                                                class="btn bgColor bgHover fw-bold text-white w-100 btnPayment rounded-6 my-4">
                                                                <p>Send with Bank Transfer</p>
                                                            </button>
                                                            </form>
                                                            <p class="fw-bold text-center text-sm">By clicking this
                                                                button, you
                                                                acknowledge
                                                                that you
                                                                have read
                                                                and agreed to
                                                                the <a href="#"
                                                                    class="text-decoration-none baseColor">Terms &
                                                                    Conditions</a>
                                                                and <a href="#"
                                                                    class="text-decoration-none baseColor">Privacy
                                                                    Policy</a> of
                                                                Gofest</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="lodging-atm" role="tabpanel"
                                                aria-labelledby="lodging-atm-tab">
                                                <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                                            </div>
                                            <div class="tab-pane fade" id="lodging-credit-card" role="tabpanel"
                                                aria-labelledby="lodging-credit-card-tab">
                                                <h5 class="fw-bold text-danger text-center mt-4">Not Avaiable</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-5 p-0 ps-lg-5">
                    <div class="notice mb-5 p-0">
                        <div class="p-4 rounded-12 bg-white">
                            <h5 class="fw-bolder m-0">Confirm Payment</h5>
                            <hr class="text-secondary">
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');
        </script>
    @endpush
</x-app-layout>
