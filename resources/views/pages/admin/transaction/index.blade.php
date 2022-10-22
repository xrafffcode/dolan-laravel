<x-admin-layout active="dashboard">
    <div class="card">
        <div class="card-header">
            Data Transaksi
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Destinasi</th>
                            <th>Nama</th>
                            <th>Tiket Untuk</th>
                            <th>Total Tiket</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->tour->title }}</td>
                                <td>{{ $transaction->name }}</td>
                                <td>{{ Carbon\Carbon::parse($transaction->date)->translatedFormat('d F Y') }}</td>
                                <td>{{ $transaction->people }} Tiket</td>
                                <td>@idr($transaction->transaction_total)</td>
                                <td>
                                    @if ($transaction->transaction_status == 'PENDING')
                                        <span
                                            class="badge bg-warning text-dark">{{ $transaction->transaction_status }}</span>
                                    @elseif($transaction->transaction_status == 'SUCCESSFUL')
                                        <span class="badge bg-success">{{ $transaction->transaction_status }}</span>
                                    @elseif ($transaction->transaction_status == 'WAITING')
                                        <span
                                            class="badge bg-warning text-dark">{{ $transaction->transaction_status }}</span>
                                    @elseif($transaction->transaction_status == 'FAILED')
                                        <span class="badge bg-danger">{{ $transaction->transaction_status }}</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.transaction.show', $transaction->id) }}"
                                        class="btn btn-primary btn-sm me-2">
                                        <i class="fas fa-eye
                                        ">
                                        </i>

                                    </a>
                                    @if ($transaction->transaction_status == 'SUCCESSFUL')
                                        <form action="{{ route('myorder.voucher.tour', $transaction->id) }}"
                                            target="_blank" method="post">
                                            @csrf

                                            <input type="hidden" name="kode" id="kode"
                                                value="{{ $transaction->transaction_code }}">
                                            <button class="btn btn-primary btn-sm ml-2">
                                                <p class="m-0"><i class="fas fa-file-alt"></i></p>
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-primary btn-sm ml-2 disabled">
                                            <p class="m-0"><i class="fas fa-file-alt"></i></p>
                                        </button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
