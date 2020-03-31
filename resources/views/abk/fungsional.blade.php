
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@stop
@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });
var jabatans = [];

var jabatanId = "-1";

@foreach($datas as $data)

    <?php if (strstr($data->nama_jabatan,'/')) : ?>
      <?php $stringFiltered = preg_replace('/\s+/', ' ', trim($data->nama_jabatan));?>

      var jabatan = {
                       label : '{{ $stringFiltered }}',
                       opd   : '{{$data->opd->nama_opd}}',
                       id    : '{{$data->id}}'    
                    }

      jabatans.push(jabatan);
      
      <?php else :?>
      <?php $stringFiltered = preg_replace('/\s+/', ' ', trim($data->nama_jabatan));?>
      var jabatan = {
                       label : '{{ $stringFiltered }}',
                       opd   : '{{$data->opd->nama_opd}}',
                       id    : '{{$data->id}}'     
                    }

      jabatans.push(jabatan);
     <?php endif ?>

  @endforeach

    $( "#tags" ).autocomplete({
      source: jabatans,
      select: function( event , ui ) {
          $('#jabatanId').val(ui.item.id);
        }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      console.log( JSON.stringify(item) ); 
      return $( "<li>" )
        .append( "<div><font style = 'font-size : 13px'>" +item.label+ "</font>"+
                 "<font style = 'font-size : 8px;margin-top : -9'> Opd : "+item.opd+"</font></div>" )
        .appendTo( ul );
    };;

  });

  console.log("halo")

</script>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/autocomplete.css')}}">
@stop

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah ABK</a>
  </div>
  <div class="col-lg-4">
  <form action="{{ url('import_abk_fungsional') }}" method="post" class="form-inline" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <input type= "hidden" name="jabatan" id="jabatanId"/>
                            <input  placeholder = "Nama jabatan" style = "width : 100%"id="tags" type="text" class="form-control" name="importAbk" required="">
   
  </div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
       
            <div class="input-group {{ $errors->has('importAbk') ? 'has-error' : '' }}">
              <input type="file" class="form-control" name="importAbk" required="">

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
                            <a class="dropdown-item" href="{{route('abk.show', ['id' => $data->id])}}"> Lihat </a>
                            <a class="dropdown-item" href="{{route('abk.edit', ['id' => $data->id])}}"> Edit </a>
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