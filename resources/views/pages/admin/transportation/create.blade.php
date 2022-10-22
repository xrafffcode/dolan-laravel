<x-admin-layout active="transportation" title="Post Transportatios">
    <div class="card">
        <div class="card-header">
            Tambah Kendaraan
        </div>
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.transportation.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Nama </label>
                        <input type="text" name="company_name" id="company_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option selected disabled>Pilih Type</option>
                            <option value="Flights">Pesawat</option>
                            <option value="Trains">Kereta</option>
                            <option value="Bus">Bus</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option disabled>Pilih Status</option>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                    </div>
                </div>


        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('admin.transportation.index') }}" type="button"
                class="btn btn-light-secondary me-1 mb-1">Kembali</a>
            <button type="submit" class="btn btn-primary me-1 mb-1">
                Tambah Kendaraan
            </button>
        </div>
        </form>
    </div>
    </div>

    {{-- @push('scripts')
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            var konten = document.getElementById("description");
            CKEDITOR.replace(konten, {
                language: 'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        </script>
    @endpush --}}
</x-admin-layout>
