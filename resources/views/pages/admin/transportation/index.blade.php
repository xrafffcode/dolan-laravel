<x-admin-layout active="transportation" title="Transportatios">
    <div class="card">
        <div class="card-header">
            Data Transportasi
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Company Name</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transportations as $transportation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $transportation->image) }}" data-lightbox="example-1">
                                        <img id="zoom-img" class="img-fluid mb-3"
                                            src="{{ asset('storage/' . $transportation->image) }}" width="100">
                                    </a>
                                </td>
                                <td>{{ $transportation->company_name }}</td>
                                <td>{{ $transportation->slug }}</td>
                                <td>{{ $transportation->type }}</td>
                                <td>{{ $transportation->status }}</td>
                                <td nowrap>
                                    <a href="{{ route('admin.transportation.edit', $transportation->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.transportation.destroy', $transportation->id) }}"
                                        method="POST" class="d-inline">
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
            <a href="{{ route('admin.transportation.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Kendaraan</a>
        </div>
    </div>
</x-admin-layout>
