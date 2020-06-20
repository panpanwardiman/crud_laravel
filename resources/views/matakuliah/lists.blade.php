@extends('welcome')

@section('content')
<a href="{{ route('matakuliah.create') }}">Create</a>
<table class="table table-bordered">
    <tr>
        <th>Kode</th>
        <th>Matakuliah</th>
        <th>Action</th>
    </tr>
    @foreach($lists as $matakuliah)
        <tr>
            <td>{{ $matakuliah->kode }}</td>
            <td>{{ $matakuliah->matakuliah }}</td>
            <td>
                <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('matakuliah.edit',$matakuliah->id) }}" class=" btn btn-success">Edit</a>
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

    {{ $lists->links() }}
</table>
@endsection