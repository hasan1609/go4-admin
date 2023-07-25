@extends('template.main')

@section('container')

<h2 class="app-page-title">Data Resto : {{ strtoupper($resto['data']['nama']) }}</h2>
<div class="app-card app-card-accordion shadow-sm mb-4">
    <div class="app-card-body p-4 pt-0">
        <div id="faq1-accordion" class="faq1-accordion faq-accordion accordion">
            @if ($resto['data']['detail_resto']['foto'] == null)
            <img class=" img-thumbnail mt-3"  src="http://192.168.2.14/go4-sumbergedang/rest-g4s/public/images/no_image.png" width="300px" alt="">
            @else
            <img class=" img-thumbnail mt-3"  src="http://192.168.2.14/go4-sumbergedang/rest-g4s{{ $resto['data']['detail_resto']['foto'] }}" width="300px" alt="">
            @endif
            <h6 class="mt-5"><strong>Nama Pemilik:</strong> {{ $resto['data']['nama'] }}</h6>
            <h6><strong>Email:</strong> {{ $resto['data']['email'] }}</h6>
            <h6><strong>No. Telepon:</strong> {{ $resto['data']['tlp'] }}</h6>
            <h6><strong>Nomor Identitas (NIK):</strong> {{ $resto['data']['detail_resto']['nik'] }}</h6>
            <h6><strong>Tempat, Tanggal Lahir:</strong> {{ strtoupper($resto['data']['detail_resto']['tempat_lahir']) }}, {{ $resto['data']['detail_resto']['ttl'] }}</h6>
            <h6><strong>Titik Poin:</strong> {{ $resto['data']['detail_resto']['latitude'] , $resto['data']['detail_resto']['longitude'] }}</h6>
            <h6><strong>Alamat:</strong> {{ $resto['data']['detail_resto']['alamat'] }}</h6>
            <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                <div class="col-auto">
                    <a class="btn btn-warning text-white" href="/resto">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
