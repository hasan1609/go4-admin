@extends('template.main')

@section('container')

<div class="page-header">
    <h3 class="app-page-title"> Ubah Data Resto </h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="app-card app-card-accordion shadow-sm mb-4">
        <div class="app-card app-card-accordion shadow-sm mb-4">
            
            <div class="app-card-body p-4">
                <div class="col-auto">
                    <form action="{{ route('resto.update', $resto['data']['id_user']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $resto['data']['id_user'] }}" id="id_user" name="id_user">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nama Resto</label>
                                    <input type="text" value="{{ $resto['data']['detail_resto']['nama_resto'] }}" id="nama_resto" name="nama_resto" class="form-control" required placeholder="Masukkan Nama Resto">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nama Lengkap / Pemilik</label>
                                    <input type="text" value="{{ $resto['data']['nama'] }}" id="nama" name="nama" class="form-control" required placeholder="Masukkan Nama Resto / Pemilik">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Email</label>
                                    <input type="text" value="{{ $resto['data']['email'] }}" name="email" id="email" class="form-control" required placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tlp/Wa</label>
                                    <input type="text" value="{{ $resto['data']['tlp'] }}" name="tlp" id="tlp" class="form-control" required placeholder="Masukkan Tlp/Wa.">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">NIK</label>
                                    <input type="text" value="{{ $resto['data']['detail_resto']['nik'] }}" name="nik" id="nik" class="form-control" required placeholder="Masukkan NIK">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tempat. Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" value="{{ $resto['data']['detail_resto']['tempat_lahir'] }}" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                        </div>
                                        <div class="col-7">
                                            <input type="date" value="{{ $resto['data']['detail_resto']['ttl'] }}" name="ttl" id="ttl" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Latitude</label>
                                    <input type="text" value="{{ $resto['data']['detail_resto']['latitude'] }}" name="latitude" id="latitude" class="form-control" required placeholder="Masukkan Latitude">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Longitude</label>
                                    <input type="text" value="{{ $resto['data']['detail_resto']['longitude'] }}" name="longitude" id="longitude" class="form-control" required placeholder="Masukkan Longitude">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-2">
                            <div class="form-group">
                                <label for="" class="mb-2">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="5" required placeholder="Masukkan Alamat Lengkap">{{ $resto['data']['detail_resto']['alamat'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Foto Resto</label>
                                <br>
                                <img src="http://192.168.2.3/go4-sumbergedang/rest-g4s{{ $resto['data']['detail_resto']['foto'] }}" class="img-thumbnail img-preview" style="margin: 5px;" width="300" />
                                <input type="file" class="form-control" placeholder="Masukkan Foto" id="foto" name="foto" onchange="prevBeritaGambar()">
                            </div>
                        </div>
                        <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                            <div class="col-auto">
                                <button class="btn app-btn-primary">
                                    SAVE
                                </button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-warning text-white" href="/resto">
                                    BATAL
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    function prevBeritaGambar() {
        const gambar = document.querySelector('#foto');
        // const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        // gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

</script>
@endpush