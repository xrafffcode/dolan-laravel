<x-admin-layout active="gallery-tour" title="Galeri">
    <div class="card">
        <div class="card-header">
            Data Gambar Destinasi
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $galeri)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $galeri->tour->title }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $galeri->image) }}" data-lightbox="example-1">
                                        <img id="zoom-img" class="img-fluid mb-3"
                                            src="{{ asset('storage/' . $galeri->image) }}" width="100">
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('admin.tour-gallery.destroy', $galeri->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.tour-gallery.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Data</a>
        </div>
    </div>
</x-admin-layout>
