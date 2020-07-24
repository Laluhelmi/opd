
@section('css')

<style>

    .direktur{
        display : inline-block;
        border-style: ridge;
        padding : 10
    }

    .b2{
        display: flex;
        width : 100%;
        /* margin-top : 35px; */
       
    }

    .horizontal-sub{
        flex : 1;
      
    }

    .horizontal-center {
        padding :0px;
        border-style: ridge;
        width: 95%;
        margin: 0 auto;
        position: relative;
        text-align : center;

        /* left: 40%; */
    }

    .flex-container{
      font-size: 11px;
      overflow-x:scroll;    
    }
    .last-child-container{
      display : flex;
    }
    .last-child{
      flex : 90;
      text-align : center;
      border-style: ridge;
      font-size : 0.7vw;
      margin-top : 5px;
      margin-right: 5px;
    }
    .vertical-line{
        background-color: black;
        /* width: 50%; */
        margin: 0 auto;
        width : 1px;
        height : 50px;
    }
    .vertical-line2{
      background-color: black;
        /* width: 50%; */
      margin: 0 auto;
      width : 1px;
      height : 10px;
    }

</style>
@stop
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
                  <!-- <h4 class="card-title pull-left">Data ABK</h4>
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
               {{--  {!! $datas->links() !!} --}} -->
                </div>
               
<div class = "flex-container">


<div>
    <center style = "margin-top : 20px">
    <div class = 'direktur'>
     Sekretaris Daerah
    </div>
    </center>
    </div>
    <div class="vertical-line"> &nbsp</div>    
    <!-- <div style = "background-color : black;height : 1px;margin-left:12.5%;margin-right:12.5%"></div>
     -->
    <div class = "b2">
    <div class="horizontal-sub">
    
        <div style = "background-color : black;height : 1px;margin-left:50%"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Asisten Perekonomian dan Pembangunan </div>
        <div class="vertical-line"> &nbsp</div> 
    
        <div class="b2">
        <div class="horizontal-sub">
        <div style = "background-color : black;height : 1px;margin-left:50%"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Kepala Bagian Ekonomi</div>
                  
        <div class="vertical-line2"> &nbsp</div> 

              <div style="width: 100%;background-color : ">
                <div style = "width: 50%;background-color: black;height:1px">
                &nbsp
                </div>
                <div style = "display: flex;background-color: ">
                  <div class="last-child-container" style = "">
                  <div style = "width: 1px;height: 100%;background-color: black;
                    margin-top : 0;flex : 1">&nbsp</div>
                    <div style = "width: 10px;height: 1px ;background-color: blue;
                    top : 50%;position: relative;
                    ;flex : 9">&nbsp</div>
                    
                    <div class="last-child">
                    Asisten Perekonomian dan Pembangunan 
                    
                    </div>
                
                  </div>
                </div>
                <div style = "display: flex">
                  <div class="last-child-container" style = "">
                  <div style = "width: 1px;height: 50%;background-color: black;
                    margin-top : 0;flex : 1">&nbsp</div>
                    <div style = "width: 10px;height: 1px ;background-color: blue;
                    top : 50%;position: relative;
                    ;flex : 9">&nbsp</div>
                    
                    <div class="last-child">
                    Asisten Perekonomian dan Pembangunan 
                    
                    </div>
                
                  </div>
                </div>
              </div>
              
        </div> 
        <div class="horizontal-sub">
        <div style = "background-color : black;height : 1px;margin-right:50%"></div>
        <div class="vertical-line"> &nbsp</div>    
         <div class="horizontal-center">Kepala Bagian Administrasi Pengendalian Pembanguna</div>
                     
        <div class="vertical-line2"> &nbsp</div> 

<div style="width: 100%;background-color : kblue">
  <div style = "width: 50%;background-color: black;height:1px">
  &nbsp
  </div>
  <div style = "display: flex">
    <div class="last-child-container" style = "">
    <div style = "width: 1px;height: 50%;background-color: black;
      margin-top : 0;flex : 1">&nbsp</div>
      <div style = "width: 10px;height: 1px ;background-color: blue;
      margin-top : 50%;margin-bottom: 51%;
      ;flex : 9">&nbsp</div>
      
      <div class="last-child">
      Asisten Perekonomian dan Pembangunan 
      
      </div>
  
    </div>
  </div>
  
</div>
        </div> 
        </div>
    </div>
    <div class="horizontal-sub">
        
    <div style = "background-color : black;height : 1px"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Sekretaris Daerah</div>
    </div>
  
    
 


    <div class="horizontal-sub">
    
    <div style = "background-color : black;height : 1px"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Asisten Pemerintahan</div>
       
    </div>

    <div class="horizontal-sub">
    
    <div style = "background-color : black;height : 1px"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Asisten Administrasi Umum</div>
        <div class="vertical-line"> &nbsp</div> 
        <div style = "background-color : black;height : 1px;margin-left:25%;margin-right:25%"></div>
    
        <div class="b2">
        <div class="horizontal-sub">
        <div class="vertical-line"> &nbsp</div>    
         <div class="horizontal-center">Kepala Bagian Pelawan Teknis</div>
        </div> 
        <div class="horizontal-sub">
        <div class="vertical-line"> &nbsp</div>    
         <div class="horizontal-center">Kepala Bagian Pelawan Teknis</div>  
        </div> 
        </div>
    </div>

    <div class="horizontal-sub">
    
    <div style = "background-color : black;height : 1px"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Staf Ahli Bidang Hukum, Politik dan Pemerintahan</div>
       
    </div>

    <div class="horizontal-sub">
    
    <div style = "background-color : black;height : 1px"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Staf Ahli Bidang Ekonomi, Keuangan dan Pembangunan</div>
       
    </div>

    <div class="horizontal-sub">
    
    <div style = "background-color : black;height : 1px;margin-right:50%"></div>
        <div class="vertical-line"> &nbsp</div>    
        <div class="horizontal-center">Staf Ahli Bidang Kemasyarakatan dan Sumber Daya Ma...</div>
        
    </div>   
    
    </div>
</div>              </div>
            </div>
          </div>

          

@endsection