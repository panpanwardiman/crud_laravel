@extends('welcome')

@section('content')
<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" class="form-control {{ $errors->has('nim') ? 'form-control is-invalid' : 'form-control' }}">
        @if($errors->has('nim'))
            <div class="invalid-feedback">{{ $errors->first('nim') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="nim">Nama</label>
        <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'form-control is-invalid' : 'form-control' }}">
        @if($errors->has('nama'))
            <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection