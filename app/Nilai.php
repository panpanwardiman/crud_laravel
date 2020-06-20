<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['nilai_harian', 'uts', 'uas', 'total', 'grade', 'mahasiswa_id', 'matakuliah_id'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function matakuliah()
    {
        return $this->belongsTo('App\Matakuliah');
    }
}
