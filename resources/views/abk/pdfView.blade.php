<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
    <style>
    
    .table2 {
        
        border: 1px solid black;
        border-collapse: collapse;
        margin-top : 20px;
        font-size : 13px;
    }

    .trhead{
        padding : 5px;
    }

    </style>
</head>
<body>
<div class = "container">
<center><h3>FORMULIR BEBAN KERJA UNTUK KEBUTUHAN PEGAWAI</h3></center>

<table>
<tr>
    <td style="width:200px" valign="top"><b>Nama Jabatan</b></td>
    <td width=1% valign = "top">:</td>
    <td>{{$jabatan->nama_jabatan}}</td>
  </tr>
  <tr>
    <td style="width:200px" valign="top"><b>Unit Kerja</b></td>
    <td width=1% valign = "top">:</td>
    <td>{{$jabatan->opd->nama_opd}}</td>
  </tr>
  <tr>
    <td style="width:200px" valign="top"><b>Ikhtisar Jabatan</b></td>
    <td width=1% valign = "top">:</td>
    <td>{{$jabatan->keterangan}}</td>
  </tr>
</table>


<table border="1" class="table2">
<tr class="trhead">
<td style = "padding: 5" align = "center"><b>No</b></td>
<td style = "padding: 5px" width = "30%" align = "center"><b>Uraian Tugas</b></td>
<td style = "padding: 5" align = "center"><b>Satuan Hasil</b></td>
<td style = "padding: 5" align = "center"><b>Waktu Penyelesaian (menit)</b></td>
<td style = "padding: 5" align = "center"><b>Waktu Kerja Efektif</b></td>
<td style = "padding: 5" align = "center"><b>Beban Kerja</b></td>
<td style = "padding: 5" align = "center"><b>Pegawai Yang Dibutuhkan</b></td>
<td style = "padding: 5" align = "center"><b>Keterangan</b></td>
</tr>

<?php $index = 1; ?>
@foreach ($datas as $data)



<tr>
<td align = "center">{{$index}}</td>
<td style = "padding : 5px">{{ $data->uraian_tugas }}</td>
<td align = "center">{{ $data->satuan_hasil }}</td>
<td align = "center">{{ $data->waktu_penyelesaian }}</td>
<td align = "center">{{ $data->waktu_kerja_efektif }}</td>
<td align = "center">{{ $data->beban_kerja }}</td>
<td align = "center">{{ $data->pegawai_dibutuhkan }}</td>
<td style = "padding : 5px">{{ $data->keterangan }}</td>
</tr>

<?php $index++;?>

@endforeach

<tr>
<td colspan="6" align="center"><b>JUMLAH</b></td>
<td></td>
<td></td>
</tr>


<tr>
<td colspan="6" align="center"><b>PEMBULATAN</b></td>
<td></td>
<td></td>
</tr>

</table>

</div>
</body>
</html>
