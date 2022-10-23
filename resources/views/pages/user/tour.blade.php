<x-app-layout title="Destinasi" active="tour">
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



    <section class="destinations container mb-7" style="margin-top: 80px">
        <div class="row m-0 justify-content-between">
            <div class="col-lg-3 p-0 mt-4">
                <div class="filter bg-white rounded-12 p-4">
                    <form action="{{ route('filter.tour') }}" method="get">
                        <h5 class="m-0 fw-bolder baseColor">Filter</h5>
                        <p class="fw-bold mt-4 mb-2">Filter Dengan Harga Terendah</p>

                        <div class="price">Rp. 0</div>
                        <input type="range" class="form-range" id="priceRange" min="0" max="100000"
                            step="1000" value="0" name="priceRange">
                        <div class="d-grid ">
                            <button class="btn btn-primary mt-4" type="submit" id="filter">Filter</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-9 p-0 ps-lg-5">
                @forelse ($tours as $d)
                    <div class="row m-0 bg-white rounded-12 mt-4">
                        <div class="col-md-9 p-4 d-flex cardy">
                            <div class="card-image rounded-3 me-4"
                                style="background-image: url('{{ $d->galleries->count() ? asset('storage/' . $d->galleries->first()->image) : asset('assets/frontend/images/default-avatar.jpg') }}')">
                            </div>
                            <div class="card-content">
                                <h4 class="fw-bolder m-0">{{ $d->title }}</h4>
                                <div class="d-flex align-items-center my-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $d->rating)
                                            <p class="text-warning text-sm me-1"><i class="fas fa-star"></i></p>
                                        @else
                                            <p class="text-secondary-light text-sm me-1"><i class="fas fa-star"></i>
                                            </p>
                                        @endif
                                    @endfor
                                    <p class="text-sm baseColor fw-bold ms-2">({{ $d->rating }})</p>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <p class="text-sm baseColor fw-bold"><i class="fas fa-map-marker-alt"></i></p>
                                    <p class="text-sm baseColor fw-bold ms-2">
                                        {{ $d->location }}
                                    </p>
                                </div>
                                <p class="m-0 fw-bold text-sm">
                                    {!! Str::limit($d->description, 200) !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 p-4 card-border d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center baseColor justify-content-center mb-4">
                                <h4 class="m-0 me-2"><i class="fas fa-comment-alt"></i></h4>
                                <h6 class="m-0 fw-bold">{{ $d->galleries->count() }} Reviews</h6>
                            </div>
                            <div>
                                <h6 class="fw-bolder baseColor mb-3 text-center">@idr($d->price) <span
                                        class="text-secondary text-sm">/
                                        Orang</span></h6>
                                <a href="/destinations/{{ Str::lower($d->location) }}/{{ $d->slug }}"
                                    class="btn bgColor text-white w-100 shadow-none">
                                    <p class="fw-bold">Lihat Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="mt-5"></div>
                    <img src="{{ asset('assets/frontend/images/empty_search.png') }}" alt="search empty" width="65%"
                        class="m-auto d-block mt-5 mt-lg-0">
                @endforelse

                <div class="d-flex justify-content-center mt-5 shadow-none">
                    {{ $tours->links('vendor.pagination.simple-bootstrap-4') }}
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
