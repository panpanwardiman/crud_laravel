@extends('welcome')

@section('content')
<a href="{{ route('nilai.index') }}">Back</a>
<table class="table table-bordered">
    <tr>
        <th>NIM</th>
        <td>{{ $nilai->nim }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ $nilai->nama }}</td>
    </tr>
    <tr>
        <th>Kode</th>
        <td>{{ $nilai->kode }}</td>
    </tr>
    <tr>
        <th>Mata kuliah</th>
        <td>{{ $nilai->matakuliah }}</td>
    </tr>
    <tr>
        <th>Nilai Harian</th>
        <td>{{ $nilai->nilai_harian }}</td>
    </tr>
    <tr>
        <th>UTS</th>
        <td>{{ $nilai->uts }}</td>
    </tr>
    <tr>
        <th>UAS</th>
        <td>{{ $nilai->uas }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $nilai->total }}</td>
    </tr>
    <tr>
        <th>Grade</th>
        <td>{{ $nilai->grade }}</td>
    </tr>
</table>
@endsection