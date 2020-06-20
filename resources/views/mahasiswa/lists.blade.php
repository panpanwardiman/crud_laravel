@extends('welcome')

@section('content')
<a href="{{ route('mahasiswa.create') }}">Create</a>
<table class="table table-bordered">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Action</th>
    </tr>
    @foreach($lists as $mahasiswa)
        <tr>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>
                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('mahasiswa.edit',$mahasiswa->id) }}" class=" btn btn-success">Edit</a>
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

    {{ $lists->links() }}
</table>
@endsection