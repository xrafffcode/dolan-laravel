<x-admin-layout active="dashboard">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
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
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldClose-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Belum Awal</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Sudah Daful</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldUser1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pendaftar Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pendaftar</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-pendaftar"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pendaftar Sudah Bayar Awal</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-pendaftar-awal"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pendaftar Sudah Bayar Daftar Ulang</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-pendaftar-daful"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">

            <div class="card">
                <div class="card-header">
                    <h4>Rekap Pendaftar</h4>
                </div>
                <div class="card-body">
                    <div id="chart-gender"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Rekap Informasi</h4>
                </div>
                <div class="card-body">
                    <div id="chart-informasi"></div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
