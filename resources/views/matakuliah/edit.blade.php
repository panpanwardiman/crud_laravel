@extends('welcome')

@section('content')
<form action="{{ route('matakuliah.update', $matkul->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" name="kode" class="form-control" value="{{ $matkul->kode }}"> 
    </div>

    <div class="form-group">
        <label for="matakuliah">Mata Kuliah</label>
        <input type="text" name="matakuliah" class="form-control" value="{{ $matkul->matakuliah }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection