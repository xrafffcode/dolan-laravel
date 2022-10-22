<x-app-layout title="Dolan" active="home">

    @push('addonStyle')
        <style>
            .search-destination {
                background: #f2f0ff;
                padding: 20px !important;
                border-radius: 30px;
                max-width: 500px;

            }

            .typeahead.dropdown-menu {
                width: 100%;
                max-width: 500px;
                top: 58% !important;
                /* position the top  edge of the element at the middle of the parent */
                left: 50% !important;
                /* position the left edge of the element at the middle of the parent */

                transform: translate(-61%, 58%) !important;


                border-radius: 30px;
                margin-top: 35px !important;

            }


            @media screen and (max-width: 769px) {
                .search-destination {
                    max-width: 100%;
                }

                .typeahead.dropdown-menu {
                    max-width: 100%;
                    transform: translate(-50%, 58%) !important;
                }
            }

            .typeahead.dropdown-menu .dropdown-item {
                padding: 10px 20px;
                border-radius: 30px;
            }

            .typeahead.dropdown-menu .dropdown-item:hover {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item.active {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item.active:hover {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item.active:focus {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item:focus {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item:focus-within {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item:focus-within:hover {
                background: #f2f0ff;
            }

            .typeahead.dropdown-menu .dropdown-item:focus-within:active {
                background: #f2f0ff;
            }
        </style>
    @endpush

    {{-- Hero --}}
    <section class="hero text-center d-flex align-items-center justify-content-center ">
        <div class="content">
            <h1 class="text-white fw-bolder m-0 px-2 display-4">Liburan di <span
                    class="baseColor fw-bolder">Banyumas</span>
                bersama Dolan</h1>
            <p class="text-white">
                Kami membantu liburan anda menjadi lebih mudah dan juga menyenangkan, dengan berbagai macam pilihan
                paket wisata yang kami sediakan.
            </p>
            <form action="{{ route('search.tour') }}" method="GET" class="container">

                <div class="input-group mb-3 d-flex justify-content-center ">
                    <input type="text" class="form-control mt-4 search-destination " placeholder="Cari Destinasi"
                        id="destination-search" name="title">
                    <button class="btn btn-primary mt-4" type="submit">Cari</button>
                </div>

            </form>

        </div>
    </section>
    {{-- End Hero --}}

    {{-- Tour --}}
    <section class="properties container mt-5">
        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="mb-3">
                <h2 class="fw-bolder mt-2">Ayo liburan ke destinasi menarik di Banyumas</h2>
                <p class="themeColor">Pilih destinasi yang anda inginkan</p>
            </div>
            <div class="deskripsi">
                <a href="#" class="btn btn-outline-base fw-bold py-2 px-4 mt-3 float-lg-end">
                    <p>Lihat Lebih Banyak</p>
                </a>
            </div>
        </div>
        <div class="properties-list d-flex py-4">
            @foreach ($tours as $tour)
                <div class="card border-0 property">
                    <div class="m-2 mb-1 border-0 position-relative">
                        <div class="card-img-top"
                            style="background-image: url('{{ $tour->galleries->count() ? asset('storage/' . $tour->galleries->first()->image) : asset('assets/frontend/images/bg-hero-gif.gif') }}');">
                        </div>
                    </div>
                    <div class="card-body pt-2 d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="rating d-flex">
                                <p class="baseColor m-0 text-sm"><i class="fas fa-star"></i></p>
                                <p class="baseColor text-sm text-base fw-bold ms-2" style="margin-top: 0.6px;">
                                    {{ $tour->rating }}
                                </p>
                                <p class="text-secondary text-sm fw-bold" style="margin-top: 0.6px;">
                                    (1)
                                </p>
                            </div>
                            <div class="d-flex align-items-center my-3 rating">
                                <p class="text-sm baseColor m-0 fw-bold">Sering Dikunjungi</p>
                            </div>
                        </div>
                        <h5 class="card-title text-base fw-bold m-0">{{ $tour->title }}</h5>
                        <div class="d-flex align-items-center">
                            <p class="text-sm text-secondary"><i class="fas fa-map-marker-alt"></i></p>
                            <p class="text-sm text-secondary ms-2">{{ $tour->location }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bolder baseColor m-0">@idr($tour->price)<br><span
                                    class="text-secondary text-sm">/Ticket
                                </span></h6>
                            <a href="/destinations/{{ Str::lower($tour->location) }}/{{ $tour->slug }}"
                                class="btn btn-outline-base px-4 shadow-none">
                                <p class="fw-bold">Lihat Detail</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- End Tour --}}

    {{-- Tour --}}
    <section class="properties container mt-5">
        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="mb-3">
                <h2 class="fw-bolder mt-2">Berbagai pilihan penginapan untuk berilbur</h2>
                <p class="themeColor">Harga terjangaku, dan juga lokasi dekat dengan tempat wisata</p>
            </div>

        </div>
        <div class="properties-list d-flex py-4">
            @foreach ($hotels as $hotel)
                <div class="card border-0 property">
                    <div class="m-2 mb-1 border-0 position-relative">
                        <div class="card-img-top"
                            style="background-image: url('{{ $hotel->galleries->count() ? asset('storage/' . $hotel->galleries->first()->image) : asset('assets/frontend/images/bg-hero-gif.gif') }}');">
                        </div>
                    </div>
                    <div class="card-body pt-2 d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="rating d-flex">
                                <p class="baseColor m-0 text-sm"><i class="fas fa-star"></i></p>
                                <p class="baseColor text-sm text-base fw-bold ms-2" style="margin-top: 0.6px;">
                                    {{ $hotel->rating }}
                                </p>
                                <p class="text-secondary text-sm fw-bold" style="margin-top: 0.6px;">
                                    (1)
                                </p>
                            </div>

                        </div>
                        <h5 class="card-title text-base fw-bold m-0">{{ $hotel->title }}</h5>
                        <div class="d-flex align-items-center">
                            <p class="text-sm text-secondary"><i class="fas fa-map-marker-alt"></i></p>
                            <p class="text-sm text-secondary ms-2">
                                {{ $hotel->city }}, {{ $hotel->area }},
                                {{ $hotel->country }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-bolder baseColor m-0">@idr($hotel->price)<br><span
                                    class="text-secondary text-sm">/Orang
                                </span></h6>
                            <a href="/hotel/{{ Str::lower($hotel->city) }}/{{ $hotel->slug }}"
                                class="btn btn-outline-base px-4 shadow-none">
                                <p class="fw-bold">Lihat Detail</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- End Tour --}}


    {{-- Tour --}}
    <section class="properties container mt-5">
        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="mb-3">
                <h2 class="fw-bolder mt-2">Berbagai pilihan transportasi tersedia</h2>
                <p class="themeColor">Pilih transportasi yang sesuai dengan kebutuhanmu</p>
            </div>

        </div>
        <div class="properties-list d-flex py-4">
            @foreach ($transportations as $data)
                <div class="property transport border">
                    <p
                        class="m-0 fw-bold text-center {{ $data->status == 'Available' ? 'bgTheme' : 'bg-danger' }} py-1 text-white">
                        {{ $data->status }}</p>
                    <div class="d-flex align-items-center p-2">
                        <div class="m-2 mb-1 border-0 position-relative w-50 pb-1">
                            <div class="card-img-top"
                                style="background-image: url('{{ Storage::url($data->image) }}'); height: 120px;">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-base fw-bolder m-0">{{ $data->company_name }}</h5>
                            <p class="text-sm fw-bold text-secondary mt-2 mb-3">{{ $data->type }}</p>
                            <a href="/transportations/{{ Str::lower($data->type) }}/{{ $data->slug }}"
                                class="btn bgColor bgHover text-white w-100 {{ $data->status == 'Unavailable' ? 'disabled' : '' }}">
                                <p class="fw-bold">Lihat Detail</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- End Tour --}}


    @push('addonScript')
        {{-- typehead --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

        <script>
            let slideIndex = 1;

            $nav.toggleClass('scrolled', $(this).scrollTop() > $hero.height());
            $(function() {
                $(document).scroll(function() {
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $hero.height());
                });
            });
        </script>

        <script>
            var route_search_tour = "{{ route('tour.search') }}";

            $("#destination-search").typeahead({
                source: function(a, b) {
                    return $.get(route_search_tour, {
                        query: a
                    }, function(a) {
                        return b(a)
                    })
                }


            });
        </script>
    @endpush


</x-app-layout>
