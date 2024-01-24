<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLineFoto extends Model
{
    use HasFactory;

    protected $table = 't_p_foto';
    
    public function timeline()
    {
        return $this->belongsTo(TimeLine::class, 'id_kegiatan');
    }
}
