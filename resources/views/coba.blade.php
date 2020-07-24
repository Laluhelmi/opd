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
        /* border-style: ridge; */
        width: 95px;
        margin: 0 auto;
        position: relative;
        text-align : center;

        /* left: 40%; */
    }

    .hcInside{
        padding :0px;
        border-style: ridge;
        width: 98%;
        margin: 0 auto;
        position: relative;
        text-align : center;

    }
    
    .horizontal-center2 {
        padding :0px;
        /* border-style: ridge; */
        width: 95px;
        margin: 0 auto;
        position: relative;
        text-align : center;
        font-size : 9px;

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
      font-size : 8px;
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

    .last-child-div{
        width: 100%;
    }

</style>
@stop
@section('js')
<script type="text/javascript">

    function createDefaultB2(){
        $('.flex-container').append('<div class="b2" id="p1"></div>');  
    }
    // <div style = "background-color : black;height : 1px;margin-left:50%"></div>
    //     <div class="vertical-line"> &nbsp</div>  
    function createBarLine(index,length){
        if (index == 0){
            if (length ==  1){
                return "";
            }
            return '<div style = "background-color : black;height : 1px;margin-left:50%"></div>';
        }
        else if (index == length - 1){
            return '<div style = "background-color : black;height : 1px;margin-right:50%"></div>';    
        }
        else {
            return '<div style = "background-color : black;height : 1px;"></div>';
        }
    } 

    function createVerticalLine(){
        return ('<div class="vertical-line"> &nbsp</div>');
    }

    function createVerticalLine2(){
        return '<div class="vertical-line2"> &nbsp</div>';
    }

    function createB2Div(name,parent){
        $('#'+parent).append('<div class="b2" id="'+name+'"></div>');  
    }

    function createLastChildContainer(id,parent){
        $('#'+parent).append('<div class="last-child-container" id="'+id+'"></div>');
    }

    function createHalfBarLine(parent){
        $("#"+parent).append('<div style = "width: 50%;background-color: black;height:1px">&nbsp</div>');
    }

    function createLeftLine(index,length){
        if (index == length - 1){
            return '<div style = "width: 1px;height: 50%;background-color: black;margin-top : 0;flex : 1">&nbsp</div>';
        }
        else {
            return '<div style = "width: 1px;height: 100%;background-color: black;margin-top : 0;flex : 1">&nbsp</div>'
        }
    }

    function createB2NonUrusan(num){    
        //$("#p1").append(horizontalSub);
        Object.keys(num).forEach(function (key,index){
            var hcInside = '<div class="hcInside">'+num[key].name+'</div>';
            var horizontalCenter = '<div class="horizontal-center">'+hcInside+'</div>';
            var idS1 = "s1"+index;
            var horizontalSub    = '<div class="horizontal-sub" id = "'+idS1+'" style = "font-size:10px">'+createBarLine(index,Object.keys(num).length)+createVerticalLine()
            +horizontalCenter+'</div>';
            $("#p1").append(horizontalSub); 
            var sub = num[key].sub;
            //check if value has subs
            var p2Id = "p2"+index;
            var sublength = Object.keys(sub).length;
            if (sublength > 0){
                    $("#"+idS1).append(createVerticalLine2());
                  $("#"+idS1).append("<div class='last-child-div' id='"+p2Id+"'></div>");   
                  createHalfBarLine(p2Id); 
                }
                Object.keys(sub).forEach(function(key,index2){
                        var flexId = "lastflex"+index+index2;
                        $("#"+p2Id).append('<div style = "display: flex" id="'+flexId+'"></div>');
                        var lastContainerId = "lasCon"+index+index2;
                        $("#"+flexId).append('<div class="last-child-container" id="'+lastContainerId+'"></div>');
                        //create left line
                        var leftLine = createLeftLine(index2,sublength);
                        //create small line in middle
                        var middleLine = '<div style = "width: 10px;height: 1px ;background-color: black;top : 50%;position: relative;;flex : 9">&nbsp</div>';
                        $("#"+lastContainerId).append(leftLine);
                        $("#"+lastContainerId).append(middleLine);
                        //create last child sub
                        $("#"+lastContainerId).append(' <div class="last-child" style = "width:95px">'+sub[key].name+'</div>');
                });
            });
    }

    function createB2Sub(num){

        //$("#p1").append(horizontalSub);
        Object.keys(num).forEach(function (key,index){
            var hcInside = '<div class="hcInside">'+num[key].name+'</div>';
            var horizontalCenter = '<div class="horizontal-center">'+hcInside+'</div>';
            var idS1 = "s1"+index;
            var horizontalSub    = '<div class="horizontal-sub" id = "'+idS1+'">'+createBarLine(index,Object.keys(num).length)+createVerticalLine()
            +horizontalCenter+'</div>';
            $("#p1").append(horizontalSub); 
            var sub = num[key].sub;
            //check if value has subs
            var p2Id = "p2"+index;
            var sublength = Object.keys(sub).length;
            if (sublength > 0){
                if (sublength > 1){
                    $("#"+idS1).append(createVerticalLine());
                }
                createB2Div(p2Id,idS1);
            }
            Object.keys(sub).forEach(function(key,index2){
                var b1Id = "p2"+index+index2;
                var hcInside = '<div class="hcInside">'+sub[key].name+'</div>';
                var horizontalCenter = '<div class="horizontal-center2">'+hcInside+'</div>';
                var idS2 = "s2"+index+index2;
                var horizontalSub    = '<div class="horizontal-sub" id = "'+idS2+'">'+createBarLine(index2,sublength)+createVerticalLine()
                +horizontalCenter+'</div>';
                $("#"+p2Id).append(horizontalSub); 
                var lastSub = sub[key].sub;
                var lastSublength = Object.keys(lastSub).length;
                var p3Id = "p3"+index+index2;
                if (lastSublength > 0){
                    $("#"+idS2).append(createVerticalLine2());
                    $("#"+idS2).append("<div class='last-child-div' id='"+p3Id+"'></div>");   
                    createHalfBarLine(p3Id); 
                }
                Object.keys(lastSub).forEach(function (key,index3){
                    var flexId = "lastflex"+index+index2+index3;
                    $("#"+p3Id).append('<div style = "display: flex" id="'+flexId+'"></div>');
                    var lastContainerId = "lasCon"+index+index2+index3;
                    $("#"+flexId).append('<div class="last-child-container" id="'+lastContainerId+'"></div>');
                    //create left line
                    var leftLine = createLeftLine(index3,lastSublength);
                    //create small line in middle
                    var middleLine = '<div style = "width: 10px;height: 1px ;background-color: black;top : 50%;position: relative;;flex : 9">&nbsp</div>';
                    $("#"+lastContainerId).append(leftLine);
                    $("#"+lastContainerId).append(middleLine);
                    //create last child sub
                    $("#"+lastContainerId).append(' <div class="last-child">'+lastSub[key].name+'</div>');
                });
            });
        });
    }

  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });
    var substructure2 = {name : "Kepala Bagian Administrasi Pengendalian Pembangunai",sub : []}; 
    
    // var substructure = {name : "Kepala Ekonomi",sub : [substructure2,substructure2]};
    // var structure   = [substructure,substructure,{name : "Kepala Ekonomi",sub : [substructure2]}];
    // var kode_bidang = [];
    // var kode_seksi  = [];   
    var structure = {};       
    @if ($isKodeUrusanExist)
        
    @foreach($datas as $data)  
            @if ($data->kode_bidang == "00" && $data->kode_seksi == "00" )
                var obj =  {name : "{{ $data->nama_jabatan }}",sub: {}}
                structure[{{ $data->kode_urusan }}] = obj;
            @elseif ($data->kode_seksi == "00" && $data->kode_bidang != "00")
                var obj = {name : "{{ $data->nama_jabatan }}",sub : {}}
                structure[{{ $data->kode_urusan }}].sub[{{$data->kode_bidang}}] = obj;

            @elseif($data->kode_bidang != "00")
                var obj = {name : "{{ $data->nama_jabatan }}"};
                structure[{{ $data->kode_urusan }}].sub[{{ $data->kode_bidang }}].sub[{{$data->kode_seksi}}] = obj; 
            //   console.log("index1 =  {{$data->kode_urusan}} index2 = {{$data->kode_bidang}}");
               console.log("{{$data->kode_urusan}}:{{$data->kode_bidang}}:{{$data->kode_seksi}} = {{$data->nama_jabatan}}");
            @endif   
       

    @endforeach   
    @else
    
    @foreach($datas as $data)  
            @if ($data->kode_seksi == "00" )
                var obj =  {name : "{{ $data->nama_jabatan }}",sub: {}}
                structure[{{ $data->kode_bidang }}] = obj;
                console.log("{{$data->nama_jabatan}}");
            @elseif ($data->kode_seksi != "00")
                var obj = {name : "{{ $data->nama_jabatan }}",sub : {}}
                structure[{{ $data->kode_bidang }}].sub[{{$data->kode_seksi}}] = obj;
                console.log("{{$data->nama_jabatan}}");
           
            // @elseif($data->kode_bidang != "00")
            //     var obj = {name : "{{ $data->nama_jabatan }}"};
            //     structure[{{ $data->kode_urusan }}].sub[{{ $data->kode_bidang }}].sub[{{$data->kode_seksi}}] = obj; 
            // //   console.log("index1 =  {{$data->kode_urusan}} index2 = {{$data->kode_bidang}}");
            //    console.log("{{$data->kode_urusan}}:{{$data->kode_bidang}}:{{$data->kode_seksi}} = {{$data->nama_jabatan}}");
            @endif   
       

    @endforeach   

    @endif                

    createDefaultB2(); 

    @if ($isKodeUrusanExist)
      createB2Sub(structure);
    @else
      createB2NonUrusan(structure); 
    @endif
 
  

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
    <div class = 'direktur' style = "padding : 10px">
     Pusat
    </div>
    </center>
    </div>
    <div class="vertical-line"> &nbsp</div>    
    <!-- <div style = "background-color : black;height : 1px;margin-left:12.5%;margin-right:12.5%"></div>
     -->
    
          </div>

          

@endsection