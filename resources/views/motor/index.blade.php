@extends('template.main')

@section('container')

<h2 class="app-page-title">Data Driver Motor</h2>
<div class="app-card app-card-accordion shadow-sm mb-4">
    <div class="app-card-header p-4 pb-2  border-0">
       <a type="button" href="/motor/create/" class="btn app-btn-primary mt-3">
        Tambah Driver
        </a>
    </div><!--//app-card-header-->
    <div class="app-card-body p-4 pt-0">
        <div id="faq1-accordion" class="faq1-accordion faq-accordion accordion">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tlp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($motor['data'] as $data )
                    <tr>
                        <td>1</td>
                        <td>{{ $data['user']['nama'] }}</td>
                        <td>{{ $data['user']['email'] }}</td>
                        <td>{{ $data['user']['tlp'] }}</td> 
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info" href="/motor/{{ $data['user_id'] }}">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                <a class="btn btn-success" href="/motor/edit/{{ $data['user_id'] }}">
                                  <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('motor.destroy', $data['user_id']) }}" method="post">
                                  @csrf
                                  <button class="btn btn-danger" onclick="return confirm('Apakah anda menyetujui ?')" >
                                  <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
