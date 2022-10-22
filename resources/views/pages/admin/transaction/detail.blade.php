<x-admin-layout active="transaction" title="Transaksi">
    <div class="card">
        <div class="card-header">
            Detail Transaksi {{ $data->transaction_code }}
        </div>
        <div class="card-body">
            <table class="table table-bordered rounded-3 bg-white my-0 mx-auto">
                <thead class="bgTheme text-white text-center">
                    <tr>
                        <th colspan="2">
                            <h5 class="m-0 fw-bold">Data</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="20%" class="align-middle">ID</th>
                        <td class="align-middle">{{ $data->id }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Destinasi</th>
                        <td class="align-middle">{{ $data->tour->title }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nama</th>
                        <td class="align-middle">{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Email Address</th>
                        <td class="align-middle">{{ $data->email }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nomer Hp</th>
                        <td class="align-middle">{{ $data->phone_number }}</td>
                    </tr>

                    <tr>
                        <th class="align-middle">Bukti Pembyaran</th>
                        <td class="align-middle">
                            @if (isset($data->payment->image))
                                <img src="{{ Storage::url($data->payment->image) }}" width="160">
                            @else
                                PENDING
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Jenis Pembayaran</th>
                        <td class="align-middle">{{ isset($data->payment->type) ? $data->payment->type : 'PENDING' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nama Pembayaran</th>
                        <td class="align-middle">{{ isset($data->payment->name) ? $data->payment->name : 'PENDING' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Tiket Untuk</th>
                        <td class="align-middle">
                            {{ Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Total Tiket</th>
                        <td class="align-middle">
                            {{ $data->people }} Tiket
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Total Harga</th>
                        <td class="align-middle">
                            @idr($data->transaction_total)
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Status</th>
                        <td class="align-middle">{{ $data->transaction_status }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Action</th>
                        <td class="align-middle d-flex align-items-center">
                            @if ($data->transaction_status == 'PENDING' or $data->transaction_status == 'WAITING')
                                <form action="{{ route('admin.transaction.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('put')

                                    <button type="submit" class="btn btn-primary text-white fw-bolder">
                                        Selesaikan Transaksi
                                    </button>
                                </form>
                                <form action="{{ route('admin.transaction-destinations.cancel', $data->id) }}"
                                    method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-danger fw-bolder mx-3">
                                        Batalkan Transaksi
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('admin.transaction.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger fw-bolder">
                                    Hapus Transaksi
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</x-admin-layout>
