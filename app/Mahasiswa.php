<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim', 'nama'];

    public function nilais()
    {
        return $this->hasMany('App\Nilai');
    }
}
