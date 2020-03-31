
@extends('layouts.app')
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    console.log("hallo"); 
    $('#table').DataTable({
      "iDisplayLength": 10
    });


    $('#myform').submit(function() {
       
    });

    //check all checkbox
    $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
    });

} );
</script>
@stop

@section('content')
<div class="row">
  <div class="col-lg-4">
   
  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-sm-12 grid-margin stretch-card" >
              <div class="card" style="padding: 10px">
              <h4>FORMULIR BEBAN KERJA UNTUK KEBUTUHAN PEGAWAI</h4>

              <div class="row">
              <div class="col-lg-4" style = "background-color">
              <p>1. Nama Jabatan</p>
              <p>2. Unit Kerja</p>
              <p>3. Ikhtisar Jabatan</p>
              </div>
              <div class="col-lg-6">
              <p>: {{ $jabatan->nama_jabatan }}</p>
              <p>: {{ $jabatan->opd->nama_opd }}</p>
              <p>: {{ $jabatan->keterangan }}</p>
              </div>
              </div>
              <hr>

                <form action="{{ url('abk/update') }}" method="post" id="myform">
                {{ csrf_field() }}
                    <table class="tableBiasa" id="">
                      <thead>
                        <tr>
                        <th>
                        <input type="checkbox" name="" value="" id="checkAll">
                        </th>
                          <th >
                           No
                          </th>
                          <th>
                            Kode Uraian
                          </th>
                          <th>
                           Satuan Hasil
                          </th>
                          <th>
                          Waktu Penyelesaian (menit)
                          </th>
                          <th>
                          Waktu Kerja Efektif
                          </th>
                          <th>
                          Beban Kerja
                          </th>
                          <th>
                          Pegawai Yang Dibutuhkan
                          </th>  <th>
                          Keterangan
                            
                        </tr>
                      </thead>
                      <tbody>
                       <?php $i = 1 ?>   
                       @foreach ($datas as $data)   
                      <tr style = "height : 60px;
                                  @if ($data->sub != 0)
                                  height : 40px;
                                  @endif
                                 ">
                            <td>
                            <input type="checkbox" name="abk_checkbox[]" value="{{$data->id_abk}}">
                            <input type="hidden" name="abk_id[]" value="{{$data->id_abk}}">
                            </td>
                            <td>
                            {{$i}}
                            </td>
                            <td>
                            <input type="text" class= "form-control" style="width:300px;
                            @if ($data->sub != 0)
                            margin-left : 20px;width: 280px;
                            @endif      
                            "
                            value = "{{$data->uraian_tugas}}" name= "uraian_tugas[]"
                            >
                            </td>
                            <td>
                            <input type="text" class= "form-control" value = "{{$data->satuan_hasil}}">
                            </td>
                            <td>
                            <input type="text" class= "form-control" value = "{{$data->waktu_penyelesaian}}">
                            </td>
                            <td>
                            <input type="text" class= "form-control" value = "{{$data->waktu_kerja_efektif}}">
                            </td>
                            <td>
                            <input type="text" class= "form-control" value = "{{$data->beban_kerja}}">
                            </td>
                            <td>
                            <input type="text" class= "form-control" value = "{{$data->pegawai_dibutuhkan}}">
                            </td>
                            <td>
                            <input type="text" class= "form-control" value = "{{$data->keterangan}}">
                            </td>
                      </tr>
                      <?php $i++;?>
                      @endforeach
                      <tr style = "height : 60px"></tr>
                      <tr>

                      <td></td><td></td>
                      <td>Jumlah</td>
                      </tr>
                      <tr>

                      <td></td><td></td>
                      <td>Pembulatan</td>
                      </tr>
                      </tbody>
                      </table>
              <div class= "col-sm-5" style= "margin-top : 10px">
              <button value = "update" class="btn btn-success" type="submit" name="update">Update Data</button>
              <button value = "delte" class="btn btn-danger" type="submit" name="delete"
              onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"
              >Delete Data</button>
              </form>
              </div>
            </div>
          </div>
@endsection