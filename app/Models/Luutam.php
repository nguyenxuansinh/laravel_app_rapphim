<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luutam extends Model
{
    use HasFactory;
    protected $table = 'luutam';

    protected $fillable = [
        'id_ghe',
        'trangthai',
        'id_suatchieu',
        
    ];
}
