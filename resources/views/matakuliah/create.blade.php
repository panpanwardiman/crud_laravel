@extends('welcome')

@section('content')
<form action="{{ route('matakuliah.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="kode">kode</label>
        <input type="text" name="kode" class="{{ $errors->has('kode') ? 'form-control is-invalid' : 'form-control' }}">
        @if($errors->has('kode'))
            <div class="invalid-feedback">{{ $errors->first('kode') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="matakuliah">matakuliah</label>p
        <input type="text" name="matakuliah" class="{{ $errors->has('matakuliah') ? 'form-control is-invalid' : 'form-control' }}">
        @if($errors->has('matakuliah'))
            <div class="invalid-feedback">{{ $errors->first('matakuliah') }}</div>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection