<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pyr_set_perizinan extends Model
{
    protected $fillable = [
        'jenis_perizinan', 'deskripsi',
        'toleransi', 'batas_pengajuan',
        'deleted'
    ];
}
