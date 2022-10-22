<x-admin-layout active="transportation" title="Edit Tranportation">
    <div class="card">
        <div class="card-header">
            Edit Transportation
        </div>
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.transportation.update', $transportation->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            id="image" value="{{ old('image') }}">
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name"
                            class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                            value="{{ old('company_name') }}">
                        @error('company_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                            id="slug" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <textarea name="type" class="form-control @error('type') is-invalid @enderror" id="type">{{ old('type') }}</textarea>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <textarea name="status" class="form-control @error('status') is-invalid @enderror" id="status">{{ old('status') }}</textarea>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.transportation.index') }}" type="button"
                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Edit Kendaraan
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
