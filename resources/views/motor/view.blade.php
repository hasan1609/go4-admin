@extends('template.main')

@section('container')

<h2 class="app-page-title">Data Drivers : {{ strtoupper($driver['data']['nama']) }}</h2>
<div class="app-card app-card-accordion shadow-sm mb-4">
    <div class="app-card-body p-4 pt-0">
        <div id="faq1-accordion" class="faq1-accordion faq-accordion accordion">
            <img class=" img-thumbnail mt-3"  src="http://192.168.2.3/go4-sumbergedang/rest-g4s{{ $driver['data']['detail_driver']['foto'] }}" width="300px" alt="">
            <h6 class="mt-5"><strong>Email:</strong> {{ $driver['data']['email'] }}</h6>
            <h6><strong>No. Telepon:</strong> {{ $driver['data']['tlp'] }}</h6>
            <h6><strong>Nomor Identitas (NIK):</strong> {{ $driver['data']['detail_driver']['nik'] }}</h6>
            <h6><strong>Tempat, Tanggal Lahir:</strong> {{ strtoupper($driver['data']['detail_driver']['tempat_lahir']) }}, {{ $driver['data']['detail_driver']['ttl'] }}</h6>
            <h6><strong>Tanggal Lahir:</strong> {{ $driver['data']['detail_driver']['ttl'] }}</h6>
            <h6><strong>Jenis Kelamin:</strong> {{ $driver['data']['detail_driver']['jk'] === 'L' ? 'Laki-laki' : 'Perempuan' }}</h6>
            <h6><strong>Alamat:</strong> {{ $driver['data']['detail_driver']['alamat'] }}</h6>
            <h6><strong>Kendaraan:</strong> {{ $driver['data']['detail_driver']['kendaraan'] }}</h6>
            <h6><strong>Status Driver:</strong> {{ $driver['data']['detail_driver']['status_driver'] }}</h6>
            <h6><strong>Nomor Plat Kendaraan:</strong> {{ $driver['data']['detail_driver']['plat_no'] }}</h6>
            <h6><strong>Tahun Kendaraan:</strong> {{ $driver['data']['detail_driver']['thn_kendaraan'] }}</h6>
            <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                <div class="col-auto">
                    <a class="btn btn-warning text-white" href="/motor">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
