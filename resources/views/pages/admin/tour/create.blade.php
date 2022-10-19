<x-admin-layout active="tour" title="Tambah Destinasi">
    <div class="card">
        <div class="card-header">
            Data Petugas
        </div>
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.tour.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="text" name="rating" class="form-control @error('rating') is-invalid @enderror"
                            id="rating" value="{{ old('rating') }}">
                        @error('rating')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Tiket</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" name="location"
                            class="form-control @error('location') is-invalid @enderror" id="location"
                            value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="map" class="form-label">Map Iframe</label>
                        <input type="text" name="map" class="form-control @error('map') is-invalid @enderror"
                            id="map" value="{{ old('map') }}">
                        @error('map')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.tour.index') }}" type="button"
                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Tambah Destinasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
