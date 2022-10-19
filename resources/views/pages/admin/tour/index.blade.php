<x-admin-layout active="tour" title="Destinasi">
    <div class="card">
        <div class="card-header">
            Data Destinasi
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                            <tr>
                                <td>{{ $tour->title }}</td>
                                <td>{{ $tour->description }}</td>
                                <td>{{ $tour->price }}</td>
                                <td>{{ $tour->location }}</td>
                                <td nowrap>
                                    <a href="{{ route('admin.tour.edit', $tour->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.tour.destroy', $tour->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.tour.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Destinasi</a>
        </div>
    </div>
</x-admin-layout>
