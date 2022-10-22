<x-admin-layout active="gallery-tour" title="Galeri">
    <div class="card">
        <div class="card-header">
            Tambah Galeri Destinasi
        </div>
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.tour-gallery.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            id="image" value="{{ old('image') }}">
                    </div>
                    <div class="mb-3">
                        <label for="destination" class="form-label">Destinasi</label>
                        <select name="tour_id" class="form-select @error('tour_id') is-invalid @enderror"
                            id="tour_id">
                            <option value="">Pilih Destinasi</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.tour.index') }}" type="button"
                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
