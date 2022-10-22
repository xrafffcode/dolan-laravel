<x-admin-layout active="dashboard">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldUser1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pengguna</h6>
                                    <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Transaksi</h6>
                                    <h6 class="font-extrabold mb-2">
                                        {{ floor((100 / $transactions->count()) * $successful) }}%
                                    </h6>
                                    <div class="progress progress-sm mb-2">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            style="width: {{ (100 / $transactions->count()) * $successful }}%;"
                                            aria-valuenow="{{ (100 / $transactions->count()) * $successful }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6 class="font-extrabold mb-0">
                                        {{ $successful }} dari {{ $transactions->count() }} Transaksi sudah berhasil
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Transaksi Berhasil</h6>
                                    <h6 class="font-extrabold mb-0"> {{ $successful }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Transaksi Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0">{{ $transactionToday }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>History Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="align-middle">ID</th>
                                        <th class="align-middle">Tujuan</th>
                                        <th class="align-middle">Pemesan</th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">Nomor Telepon</th>
                                        <th class="align-middle">Tiket Tanggal</th>
                                        <th class="align-middle">Total Pembayaran</th>
                                        <th class="align-middle">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $data)
                                        <tr>
                                            <td class="align-middle">{{ $data->id }}</td>
                                            <td class="align-middle">{{ $data->tour->title }}</td>
                                            <td class="align-middle">{{ $data->name }}</td>
                                            <td class="align-middle">{{ $data->email }}</td>
                                            <td class="align-middle">{{ $data->phone_number }}</td>
                                            <td class="align-middle" nowrap>
                                                {{ Carbon\Carbon::parse($data->check_in)->translatedFormat('d F Y') }}
                                            </td>
                                            </td>

                                            <td class="align-middle">@idr($data->transaction_total)</td>
                                            <td class="align-middle">{{ $data->transaction_status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-transaksi"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-3">


            <div class="card">
                <div class="card-header">
                    <h4>Chart Pembelian</h4>
                </div>
                <div class="card-body">
                    <div id="chart-informasi"></div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
