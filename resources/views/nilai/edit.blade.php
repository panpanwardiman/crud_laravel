@extends('welcome')

@section('content')
<form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="number" name="nim" id="nim" class="{{ $errors->has('nim') ? 'form-control is-invalid' : 'form-control' }}" value="{{ $nilai->nim }}" readonly>
        @if($errors->has('nim'))
            <div class="invalid-feedback">{{ $errors->first('nim') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $nilai->nama }}" readonly>
    </div>

    <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" name="kode" id="kode" class="{{ $errors->has('kode') ? 'form-control is-invalid' : 'form-control' }}" value="{{ $nilai->kode }}" readonly>
        @if($errors->has('kode'))
            <div class="invalid-feedback">{{ $errors->first('kode') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="matakuliah">Mata Kuliah</label>
        <input type="text" name="matakuliah" id="matakuliah" class="form-control" value="{{ $nilai->matakuliah }}" readonly>
    </div>

    <div class="form-group">
        <label for="nilai_harian">Nilai Harian</label>
        <input type="text" name="nilai_harian" id="nilai_harian" class="{{ $errors->has('nilai_harian') ? 'form-control is-invalid' : 'form-control' }}" value="{{ $nilai->nilai_harian }}">
        @if($errors->has('nilai_harian'))
            <div class="invalid-feedback">{{ $errors->first('nilai_harian') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="uts">UTS</label>
        <input type="text" name="uts" id="uts" class="{{ $errors->has('uts') ? 'form-control is-invalid' : 'form-control' }}" value="{{ $nilai->uts }}">
        @if($errors->has('uts'))
            <div class="invalid-feedback">{{ $errors->first('uts') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="uas">UAS</label>
        <input type="text" name="uas" id="uas" class="{{ $errors->has('uas') ? 'form-control is-invalid' : 'form-control' }}" value="{{ $nilai->uas }}">
        @if($errors->has('uas'))
            <div class="invalid-feedback">{{ $errors->first('uas') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" name="total" id="total" class="form-control" value="{{ $nilai->total }}" readonly>
    </div>

    <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" name="grade" id="grade" class="form-control" value="{{ $nilai->grade }}" readonly>
    </div>

    <input type="hidden" id="mahasiswa_id" name="mahasiswa_id" value="{{ $nilai->mahasiswa_id }}">
    <input type="hidden" id="matakuliah_id" name="matakuliah_id" value="{{ $nilai->matakuliah_id }}">

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const nilai_harian = document.getElementById('nilai_harian');
    const uts = document.getElementById('uts');
    const uas = document.getElementById('uas');
    const total = document.getElementById('total');
    const grade = document.getElementById('grade');

    uas.addEventListener('change', function(e) {
        e.preventDefault()

        if (nilai_harian.value == '' || uts.value == '' || uas.value == '') {
            alert('nilai_harian, uts dan uas tidak boleh kosong!')
            uas.value = ''
        } else {
            let harian = nilai_harian.value.replace(',', '.')
            let nilai_uts = uts.value.replace(',', '.')
            let nilai_uas = uas.value.replace(',', '.')
            let result = 0

            result = (parseFloat(harian) * 20 / 100) + (parseFloat(nilai_uts) * 40 / 100) + (parseFloat(nilai_uas) * 40 / 100)

            total.value = result
            total.value.replace(',', '.')

            if (result > 80 && result <= 100) {
                grade.value = 'A'
            } else if (result > 70) {
                grade.value = 'B'
            } else if (result > 60) {
                grade.value = 'C'
            } else if (result > 50) {
                grade.value = 'D'
            } else {
                grade.value = 'E'
            }
        }
    })
</script>
@endpush