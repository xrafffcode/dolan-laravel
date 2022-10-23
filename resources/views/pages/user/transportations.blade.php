<x-app-layout title="Kendaraan" active="transportation">
    @push('addonStyle')
        <style>
            body {
                background: #f2f0ff !important;
            }

            section {
                margin-bottom: 60px;
            }

            .card-image {
                height: 250px;
                min-width: 220px;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .card-border {
                border-left: 2px solid #cbd1df;
            }

            .mb-7 {
                margin-bottom: 100px;
            }

            @media screen and (max-width: 769px) {
                .card-border {
                    border: 0;
                    border-top: 2px solid #cbd1df;
                }
            }

            @media screen and (max-width: 524px) {
                .card-image {
                    min-width: 100%;
                    margin-bottom: 20px;
                }

                .cardy {
                    flex-wrap: wrap;
                }
            }
        </style>
    @endpush




    <section class="destinations container mb-7" style="margin-top: 100px;">
        <div class="row m-0 justify-content-between">
            <div class="col-lg-3 p-0 mt-4">
                <div class="filter bg-white rounded-12 p-4">
                    <h5 class="m-0 fw-bolder baseColor">Filter</h5>
                    <p class="fw-bold mt-4 mb-2">Dengan Rating</p>
                    <div class="row m-0 justify-content-between">
                        <div class="col-6 p-0 my-1">
                            <div class="form-check">
                                <input class="form-check-input shadow-none bg-secondary-light" type="checkbox"
                                    value="" id="5">
                                <label class="form-check-label fw-bold" for="5">
                                    5 Stars
                                </label>
                            </div>
                        </div>
                        <div class="col-6 p-0 my-1">
                            <div class="form-check">
                                <input class="form-check-input shadow-none bg-secondary-light" type="checkbox"
                                    value="" id="4">
                                <label class="form-check-label fw-bold" for="4">
                                    2 Stars
                                </label>
                            </div>
                        </div>
                        <div class="col-6 p-0 my-1">
                            <div class="form-check">
                                <input class="form-check-input shadow-none bg-secondary-light" type="checkbox"
                                    value="" id="3">
                                <label class="form-check-label fw-bold" for="3">
                                    4 Stars
                                </label>
                            </div>
                        </div>
                        <div class="col-6 p-0 my-1">
                            <div class="form-check">
                                <input class="form-check-input shadow-none bg-secondary-light" type="checkbox"
                                    value="" id="2">
                                <label class="form-check-label fw-bold" for="2">
                                    1 Star
                                </label>
                            </div>
                        </div>
                        <div class="col-6 p-0 my-1">
                            <div class="form-check">
                                <input class="form-check-input shadow-none bg-secondary-light" type="checkbox"
                                    value="" id="1">
                                <label class="form-check-label fw-bold" for="1">
                                    3 Stars
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 p-0 ps-lg-5">
                <div class="row m-0 justify-content-between">
                    @forelse ($data as $d)
                        <div class="col-md-5 bg-white rounded-12 mt-4 p-4">
                            <div class="card-image rounded-3 me-4 w-100"
                                style="background-image: url('{{ asset('storage/' . $d->image) }}')">
                            </div>
                            <div class="card-content">
                                <h4 class="fw-bolder m-0 mt-4">{{ $d->company_name }}</h4>
                                <h6 class="fw-bold mt-3 mb-4 baseColor">{{ $d->type }}</h6>
                            </div>
                            <a href="/transportations/{{ Str::lower($d->type) }}/{{ $d->slug }}"
                                class="btn bgColor bgHover text-white w-100 {{ $d->status == 'Unavailable' ? 'disabled' : '' }}">
                                <p class="fw-bold">Details</p>
                            </a>
                        </div>
                    @empty
                        <div class="mt-5"></div>
                        <img src="{{ url('frontend/images/empty_search.png') }}" alt="search empty" width="65%"
                            class="m-auto d-block mt-5 mt-lg-0">
                    @endforelse
                </div>

                <div class="d-flex justify-content-center mt-5 shadow-none">
                    {{ $data->links('vendor.pagination.simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>

    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');
        </script>

        <script>
            const priceRange = document.querySelector('#priceRange');
            const btnFilter = document.querySelector('#filter');

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            priceRange.addEventListener('change', function() {
                const price = document.querySelector('.price');
                price.innerHTML = formatRupiah(this.value, 'Rp. ');

                if (this.value == 0) {
                    btnFilter.setAttribute('disabled', true);
                } else {
                    btnFilter.removeAttribute('disabled');
                }
            });
        </script>



        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    @endpush
</x-app-layout>
