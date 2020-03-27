@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah ABK</a>
  </div>
  <div class="col-lg-4">

  <select class="form-control" name="level" required="">
                                <option value="">--Pilih Jabatan--</option>
                                @foreach($datas as $data)
                                   <option value="admin">{{$data->nama_jabatan}}</option>
                                @endforeach
                            </select>
   
  </div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <form action="{{ url('import_buku') }}" method="post" class="form-inline" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group {{ $errors->has('importBuku') ? 'has-error' : '' }}">
              <input type="file" class="form-control" name="importBuku" required="">

              <span class="input-group-btn">
                              <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                            </span>
            </div>
          </form>

        </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data ABK</h4>
                  <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format ABK</a>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Kode Jabatan
                          </th>
                          <th>
                            Nama Jabatan
                          </th>
                          <th>
                            Kelas Jabatan
                          </th>
                          <th>
                            Persediaan Pegawai
                          </th>
                          <th>
                            OPD
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>

                          <td>
                            {{$data->kode_opd}}.{{$data->kode_urusan}}.{{$data->kode_bidang}}.{{$data->kode_seksi}}.{{$data->kode_jabatan}}
                          </td>
                          <td>
                          {{$data->nama_jabatan}}
                          </td>
                          <td>
                          {{$data->kelas_jabatan}}
                          </td>
                          <td>
                          {{$data->persediaan_pegawai}}
                          </td>
                          <td>
                          {{$data->opd->nama_opd}}
                          </td>
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href=""> Edit </a>
                            <form action="" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection