@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('opd.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah OPD Baru</h4>
                      
                        <div class="form-group{{ $errors->has('kode_opd') ? ' has-error' : '' }}">
                            <label for="kode_opd" class="col-md-4 control-label">Kode Opd</label>
                            <div class="col-md-6">
                                <input id="kode_opd" type="text" class="form-control" name="kode_opd" value="{{ old('kode_opd') }}" required>
                                @if ($errors->has('kode_opd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_opd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_opd') ? ' has-error' : '' }}">
                            <label for="nama_opd" class="col-md-4 control-label">Nama OPD</label>
                            <div class="col-md-6">
                                <input id="nama_opd" type="text" class="form-control" name="nama_opd" value="{{ old('nama_opd') }}" required>
                                @if ($errors->has('nama_opd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_opd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('opd.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection