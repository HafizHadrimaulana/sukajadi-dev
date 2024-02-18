<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSarpras extends Model
{
    use HasFactory;

    protected $table = 'j_data_sarpras';
    protected $primaryKey = 'id_j_data_sarpras';
    public $timestamps = false;



    
}
