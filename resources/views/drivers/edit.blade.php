@extends('template.main')

@section('container')

<div class="page-header">
    <h3 class="app-page-title"> Update Data Driver </h3>
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
                    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $driver['data']['id_user'] }}">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nama Driver</label>
                                    <input type="text" value="{{ $driver['data']['nama'] }}" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Driver">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Email</label>
                                    <input type="text" value="{{ $driver['data']['email'] }}" name="email" id="email" class="form-control" placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tlp/Wa</label>
                                    <input type="text" value="{{ $driver['data']['tlp'] }}" name="tlp" id="tlp" class="form-control" placeholder="Masukkan Tlp/Wa.">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Pilih Kategori</label>
                                    <select class="form-select" name="status_driver">
                                        <option value="motor" {{ $driver['data']['detail_driver']['status_driver'] == "motor" ? 'selected' : '' }}>Motor</option>
                                        <option value="mobil" {{ $driver['data']['detail_driver']['status_driver'] == "mobil" ? 'selected' : '' }}>Mobil</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">NIK</label>
                                    <input type="text" disabled value="{{ $driver['data']['detail_driver']['nik'] }}" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tempat. Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" value="{{ $driver['data']['detail_driver']['tempat_lahir'] }}" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                        </div>
                                        <div class="col-7">
                                            <input type="date" value="{{ $driver['data']['detail_driver']['ttl'] }}" name="ttl" id="ttl" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nama Kendaraan</label>
                                    <input type="text" value="{{ $driver['data']['detail_driver']['kendaraan'] }}" id="kendaraan" name="kendaraan" class="form-control" placeholder="Masukkan Nama Kendaraan">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="mb-2">Plat No.</label>
                                    <input type="text" value="{{ $driver['data']['detail_driver']['plat_no'] }}"" name="plat_no" id="plat_no" class="form-control" placeholder="Masukkan Plat No.">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tahun Kendaraan</label>
                                    <input type="text" value="{{ $driver['data']['detail_driver']['thn_kendaraan'] }}" name="thn_kendaraan" id="thn_kendaraan" class="form-control" placeholder="Masukkan Tahun Kendaraan">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-2">
                            <div class=form-group>
                                <label for="jk">Jenis Kelamin</label>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="jk" id="jk" value="lk" {{ $driver['data']['detail_driver']['jk'] == "lk" ? 'checked' : '' }} required> Laki-Laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="">
                                        <input type="radio" name="jk" id="jk" value="pr" {{ $driver['data']['detail_driver']['jk'] == "pr" ? 'checked' : '' }} required> Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-2">
                            <div class="form-group">
                                <label for="" class="mb-2">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat Lengkap">{{ $driver['data']['detail_driver']['alamat'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Foto</label>
                                <br>
                                <img src="http://192.168.2.20/go4-sumbergedang/rest-g4s{{ $driver['data']['detail_driver']['foto'] }}" class="img-thumbnail img-preview" style="margin: 5px;" width="300" />
                                <input type="file" class="form-control"placeholder="Masukkan Foto" id="foto" name="foto" onchange="prevBeritaGambar()">
                            </div>
                        </div>
                        <div class="row g-2 justify-content-start justify-content-md-start align-items-center">
                            <div class="col-auto">
                                <button class="btn app-btn-primary">
                                    SAVE
                                </button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-warning text-white" href="/drivers">
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