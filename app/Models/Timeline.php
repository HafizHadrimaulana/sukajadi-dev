<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLine extends Model
{
    use HasFactory;

    protected $table = 't_p_kegiatan';


    public function foto()
    {
        return $this->hasMany(TimeLineFoto::class, 'id_kegiatan');
    }
}
