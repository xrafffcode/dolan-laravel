<x-admin-layout active="hotel" title="Penginapan">
    <div class="card">
        <div class="card-header">
            Data Penginapan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Rating</th>
                            <th>Lokasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotels as $hotel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hotel->title }}</td>
                                <td>{!! Str::limit($hotel->description, 300) !!}</td>
                                <td nowrap>@idr($hotel->price)</td>
                                <td>{{ $hotel->rating }}</td>
                                <td>{{ $hotel->city }}, {{ $hotel->area }},
                                    {{ $hotel->country }}</td>
                                <td nowrap>
                                    <a href="{{ route('admin.hotel.edit', $hotel->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.hotel.destroy', $hotel->id) }}" method="POST"
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
            <a href="{{ route('admin.hotel.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Destinasi</a>
        </div>
    </div>


</x-admin-layout>
