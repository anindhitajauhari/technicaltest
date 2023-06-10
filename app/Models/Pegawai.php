<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'pegawai_id');
    }

    public function kontrakPegawai()
    {
        return $this->hasOne(KontrakPegawai::class, 'pegawai_id');
    }


}


