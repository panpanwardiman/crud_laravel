@extends('welcome')

@section('content')
<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}"> 
    </div>

    <div class="form-group">
        <label for="nim">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection