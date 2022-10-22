<x-admin-layout active="tour" title="Penginapan">
    <div class="card">
        <div class="card-header">
            Data Penginapan
        </div>
        <div class="card-body">
            <form action="{{ route('admin.hotel.store') }}" method="post">
                @csrf

                <div class="form-group my-4">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" rows="6"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group my-4">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="text" name="rating" id="rating" class="form-control">
                    </div>
                    <div class="row m-0">
                        <div class="col-md-2 mt-md-0 mt-2 p-0">
                            <div class="form-group">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" name="city" id="city"
                                    class="form-control    @error('city') is-invalid @enderror"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mt-md-0 mt-2 mx-md-4 p-0">
                            <div class="form-group">
                                <label for="area" class="form-label">Daerah</label>
                                <input type="text" name="area" id="area"
                                    class="form-control @error('area') is-invalid @enderror"
                                    value="{{ old('area') }}">

                                @error('area')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mt-md-0 mt-2 p-0">
                            <div class="form-group">
                                <label for="country" class="form-label">Negara</label>
                                <input type="text" name="country" id="country" class="form-control"
                                    value="Indonesia" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-2 mb-4">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-3">Facilities</label>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" value="1" name="restaurant"
                                    id="restaurant">
                                <label class="form-check-label" for="restaurant">
                                    Tempat Makan
                                </label>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" value="1" name="wifi"
                                    id="wifi">
                                <label class="form-check-label" for="wifi">
                                    Wifi
                                </label>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" value="1" name="elevator"
                                    id="elevator">
                                <label class="form-check-label" for="elevator">
                                    Elevator
                                </label>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" value="1" name="breakfast"
                                    id="breakfast">
                                <label class="form-check-label" for="breakfast">
                                    Sarapan
                                </label>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" value="1" name="parking"
                                    id="parking">
                                <label class="form-check-label" for="parking">
                                    Tempat Parkir
                                </label>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" value="1" name="laundry"
                                    id="laundry">
                                <label class="form-check-label" for="laundry">
                                    Laundry
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-1 mb-1 float-end">Tambah Penginapan</button>
            </form>

        </div>
    </div>


    @push('scripts')
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            var konten = document.getElementById("description");
            CKEDITOR.replace(konten, {
                language: 'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        </script>
    @endpush
</x-admin-layout>
