@extends('welcome')

@section('content')
<a href="{{ route('nilai.create') }}">Create</a>
<table class="table table-bordered">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kode</th>
        <th>Matakuliah</th>
        <th>Nilai Harian</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Total</th>
        <th>Grade</th>
        <th>Action</th>
    </tr>
    @foreach($lists as $nilai)
        <tr>
            <td>{{ $nilai->nim }}</td>
            <td>{{ $nilai->nama }}</td>
            <td>{{ $nilai->kode }}</td>
            <td>{{ $nilai->matakuliah }}</td>
            <td>{{ $nilai->nilai_harian }}</td>
            <td>{{ $nilai->uts }}</td>
            <td>{{ $nilai->uas }}</td>
            <td>{{ $nilai->total }}</td>
            <td>{{ $nilai->grade }}</td>
            <td>
                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('nilai.edit',$nilai->id) }}" class=" btn btn-success">Edit</a>
                    <a href="{{ route('nilai.show', $nilai->id) }}" class="btn btn-info">Show</a>
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

    {{ $lists->links() }}
</table>
@endsection