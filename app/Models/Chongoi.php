<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chongoi extends Model
{
    use HasFactory;
    protected $table = 'chongoi';

    protected $fillable = [
        'id_ghe',
        'trangthai',
        'id_thanhtoan',
        'id_suatchieu',
        
    ];

    /*public function ghevatly()
    {
        return $this->belongsTo(Ghe::class, 'id_ghe');
    }*/

    public function hoadon()
    {
        return $this->belongsTo(Hoadon::class, 'id_thanhtoan');
    }

    public function suatchieu()
    {
        return $this->belongsTo(Suatchieu::class, 'id_suatchieu');
    }
}
